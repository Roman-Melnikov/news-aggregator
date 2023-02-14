<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

final class NewsQueryBuilder extends QueryBuilder
{

    private Builder $model;

    /**
     * @param Builder $model
     */
    public function __construct(Builder $model)
    {
        $this->model = News::query();
    }

    public function getAll(): Collection
    {
        return News::query()->get();
    }

    public function getNewsWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->with('categories')->paginate($quantity);
    }

    public function getNewsByStatus(string $status): Collection
    {
        return $this->model->where('status', '=', $status)->get();
    }

    public function getNewsById(int $id): Model|RedirectResponse
    {
        $news = $this->model->find($id);

        if (empty($news)) {
            return \redirect()->route('news.index');
        }
        return $news;
    }
}
