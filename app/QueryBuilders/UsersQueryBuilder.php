<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class UsersQueryBuilder extends QueryBuilder
{

    public Builder $model;

    /**
     * @param Builder $model
     */
    public function __construct(Builder $model)
    {
        $this->model = User::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getUsersWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }
}
