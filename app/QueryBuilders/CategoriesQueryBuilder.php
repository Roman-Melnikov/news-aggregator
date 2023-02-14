<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class CategoriesQueryBuilder extends QueryBuilder
{

    private Builder $model;

    /**
     * @param Builder $model
     */
    public function __construct(Builder $model)
    {
        $this->model = Category::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getAllWithPagination(int $quantity = 8): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

    public function show(Category $category): mixed
    {
        return $category->news;
    }

    public function getNewsOneCategoryWithPagination(Category $category, int $quantity = 8): LengthAwarePaginator
    {
        return $category->news()->paginate($quantity);
    }
}
