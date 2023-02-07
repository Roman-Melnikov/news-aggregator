<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Sourse;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class SourcesQueryBuilder extends QueryBuilder
{

    private Builder $model;

    /**
     * @param Builder $model
     */
    public function __construct(Builder $model)
    {
        $this->model = Sourse::query();
    }

    public function getAll(): Collection
    {
        $this->model->get();
    }

    public function getAllWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }
}
