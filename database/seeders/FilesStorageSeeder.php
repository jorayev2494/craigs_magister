<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FilesStorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #region Copy Admin asset Files
        $adminAssetDirImages = sprintf('%s/%s/%s/', resource_path(), 'assets', 'images');
        if (File::exists($adminAssetDirImages)) {
            
            $adminStorageImagesDir = sprintf('%s/%s/%s/%s', storage_path(), 'app', 'public', 'images');
            if (Storage::disk('public')->exists('images')) {
                Storage::disk('public')->deleteDirectory('images');
            }

            File::copyDirectory($adminAssetDirImages, $adminStorageImagesDir);
        }
        #endregion

        #region Copy Client UI asset Files
        $clientAssetDirImages = sprintf('%s/%s/%s/', resource_path(), 'client', 'images');
        if (File::exists($clientAssetDirImages)) {
            $clientStorageImagesDir = sprintf('%s/%s/%s/%s', storage_path(), 'app', 'public', 'images');
            // if (Storage::disk('public')->exists('images')) {
            //     Storage::disk('public')->deleteDirectory('images');
            // }

            File::copyDirectory($clientAssetDirImages, $clientStorageImagesDir);
        }
        #endregion
    }
}
