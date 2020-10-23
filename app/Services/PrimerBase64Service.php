<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Carrier\Carrier;
use App\Models\Documents;
use App\Models\Trips\Trips;
use App\Services\Base\DownloadFileTrait;
use App\Services\Base\UploadFileTrait;
use App\Traits\Base64Calculations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * Class CarrierDocumentsService
 *
 * @package App\Services
 */
class CarrierDocumentsService
{
    use Base64Calculations;

    use UploadFileTrait;

    use DownloadFileTrait;

    public const STR_RANDOM_LENGTH = 16;

    /**
     * @return string
     */
    protected function baseFolder(): string
    {
        return 'carriers';
    }

    /**
     * Save base64 encoded file
     *
     * @param Carrier $carrier
     * @param object $document
     */
    public function storeFileForUser(Carrier $carrier, object $document): void
    {
        [
            'mime_type' => $mimeType,
            'image_type' => $imageType,
            'image_base64' => $image,
        ] = $this->decodeBase64($document->base64_file);
        $documentData['size'] = $this->calculateBytesInStr($document->base64_file);
        $documentData['name'] = $document->type . "_" . Str::random(self::STR_RANDOM_LENGTH) . '.' . $imageType;
        $documentData['path'] = $this->baseFolder() . '/' . $carrier->uuid . '/' . $document->type . '/'
            . $documentData['name'];
        $documentData['type'] = $document->type;
        $documentData['mime_type'] = $mimeType;
        $documentData['user_file_name'] = $document->user_file_name ?? null;
        $this->store($documentData['path'], $image);
        $carrier->documents()->create($documentData);
    }

    private function deleteDocumentById(int $id): void
    {
        Documents::query()->find($id)->delete();
    }

    private function checkCarrierDocument(int $id, int $carrierId, TripsService $tripsService): void
    {
        $tripsService->newQuery()->join('trips_truck', 'trips.truck_trip_id', '=', 'trips_truck.id')
            ->join('trucks', 'trips_truck.trucks_id', '=', 'trucks.id')
            ->join('trip_documents', 'trips.id', '=', 'trip_documents.trip_id')
            ->where('trucks.carrier_id', $carrierId)->where('trip_documents.documents_id', $id)->firstOrFail();
    }

    public function deleteDocument(int $id, int $carrierId, TripsService $tripsService): void
    {
        $this->checkCarrierDocument($id, $carrierId, $tripsService);
        $this->deleteDocumentById($id);
    }

    private function removePrevTripFile(Trips $trip, string $type, int $carrierId): void
    {
        $this->checkTripCarrier($trip, $carrierId);
        $trip->documents()->where('type', $type)->get()->map(
            function ($document) {
                $this->deleteDocumentById($document->id);
            }
        );
    }

    private function checkTripCarrier(Trips $trip, int $carrierId): void
    {
        $trip->newQuery()->join('trips_truck', 'trips.truck_trip_id', '=', 'trips_truck.id')
            ->join('trucks', 'trips_truck.trucks_id', '=', 'trucks.id')->where('trucks.carrier_id', $carrierId)
            ->findOrFail($trip->id);
    }

    public function storeTripFileForUser(Trips $trip, UploadedFile $file, string $type, int $carrierId, string $userFileName  = NULL): void
    {
        $this->checkTripCarrier($trip, $carrierId);
        $this->removePrevTripFile($trip, $type, $carrierId);
        $extension = Arr::last(explode("/", $file->getMimeType()));
        $path = $this->baseFolder() . '/trips/' . $trip->id . '/' . $type . '/';
        $documentData['size'] = $file->getSize();
        $documentData['name'] = $type . "_" . Str::random(self::STR_RANDOM_LENGTH) . '.' . $extension;
        $documentData['path'] = $path . $documentData['name'];
        $documentData['type'] = $type;
        $documentData['mime_type'] = $file->getMimeType();
        $documentData['user_file_name'] = $userFileName;
        $file->storeAs($path, $documentData['name']);
        $trip->documents()->create($documentData);
    }

    /**
     * Save file
     *
     * @param Carrier $carrier
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $type
     * @param string|null $userFileName
     */
    public function storeFileObjectForUser(
        Carrier $carrier,
        UploadedFile $file,
        string $type,
        string $userFileName = null
    ): void
    {
        $extension = Arr::last(explode("/", $file->getMimeType()));
        $path = $this->baseFolder() . '/' . $carrier->uuid . '/' . $type . '/';
        $documentData['size'] = $file->getSize();
        $documentData['name'] = $type . "_" . Str::random(self::STR_RANDOM_LENGTH) . '.' . $extension;
        $documentData['path'] = $path . $documentData['name'];
        $documentData['type'] = $type;
        $documentData['user_file_name'] = $userFileName;
        $documentData['mime_type'] = $file->getMimeType();
        $file->storeAs($path, $documentData['name']);
        $carrier->documents()->create($documentData);
    }
}
