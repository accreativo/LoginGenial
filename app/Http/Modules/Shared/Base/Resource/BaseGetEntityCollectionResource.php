<?php

namespace App\Http\Modules\Shared\Base\Resource;

use Illuminate\Http\Resources\Json\ResourceCollection;

abstract class BaseGetEntityCollectionResource extends ResourceCollection
{
    protected string $resourceClass;

    public function toArray($request)
    {
        return [
            'items' => ($this->resourceClass)::collection($this->collection),
            'meta' => $this->metaFields(),
        ];
    }

    protected function metaFields(): array
    {
        $meta = [
            'quantity' => $this->collection->count(),
        ];

        if ($this->resource instanceof \Illuminate\Pagination\AbstractPaginator) {
            $meta['pagination'] = [
                'total'        => $this->resource->total(),
                'count'        => $this->resource->count(),
                'perPage'      => $this->resource->perPage(),
                'currentPage'  => $this->resource->currentPage(),
                'totalPages'   => $this->resource->lastPage(),
            ];
        }

        return $meta;
    }
}
