<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::getNews();
        return \view('news.index')->with('news', $news);
    }

    public function show(int $id)
    {
        $newsOne = News::getNewsById($id);
        return \view('news.show')->with('newsOne', $newsOne);
    }
}
