<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNews(): Collection
    {
        return DB::table($this->table)->get();
    }

    public function getNewsById(int $id): mixed
    {
        $news = DB::table($this->table)->find($id);

        if (empty($news)) {
            return redirect()->route('news.index');
        }
        return $news;
    }

    public function getNewsByCategoryId(int $id): Collection
    {
        $news = DB::table($this->table)
            ->join('category_has_news', $this->table . '.id', '=', 'category_has_news.news_id')
            ->join('categories', 'category_has_news.category_id', '=', 'categories.id')
            ->where('categories.id', '=', $id)
            ->select([$this->table . '.*', 'categories.title as category_name'])
            ->get();

        return $news;
    }
}
