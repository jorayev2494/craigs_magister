<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

/**
 * Trait Pagination
 */
trait Pagination
{
    /**
     * @var int $perPage
     */
    protected int $perPage = 15;

    /**
     * @var int $currentPage
     */
    protected int $currentPage = 1;

    /**
     * @param array $args
     * @param integer $perPage
     * @param integer $currentPage
     * @return void
     */
    private function multiplePaginate(array $args, int &$perPage, int &$currentPage = 1)
    {
        if (isset($args['perPage'])) {
            $perPage = $args['perPage'];
        }

        if (isset($args['currentPage'])) {
            $currentPage = $args['currentPage'];
        }

        Paginator::currentPageResolver(function() use($currentPage) {
            return $currentPage;
        });
    }

    /**
     * @param Request $request
     * @return void
     */
    protected function resolvePaginate(Request $request)
    {
        $this->currentPage  = (int) $request->get('current_page', $this->currentPage);
        $this->perPage      = (int) $request->get('per_page', $this->perPage);
        
        Paginator::currentPageResolver(function() {
            return $this->currentPage;
        });

    }    

    protected function getDataForResponse(Collection $collection): LengthAwarePaginator
    {
        return new LengthAwarePaginator(
            $collection->forPage($this->currentPage, $this->perPage)->values(),
            $collection->count(),
            $this->perPage,
            $this->currentPage
        );
    }
}
