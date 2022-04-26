<?php


namespace App\API\Shared\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \Illuminate\Pagination\LengthAwarePaginator
 */
class LengthAwarePaginatorResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'current_page' => $this->currentPage(),
            'from'         => $this->firstItem(),
            'last_page'    => $this->lastPage(),
            'per_page'     => $this->perPage(),
            'to'           => $this->lastItem(),
            'total'        => $this->total(),
        ];
    }
}
