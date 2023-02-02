<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\View\View;

class NewsController extends Controller
{
    public function index(News $news): View
    {
        return \view('news.index', [
            'news' => $news->getNews(),
        ]);
    }

    public function show(int $id, News $news): View
    {
        return \view('news.show', [
            'newsOne' => $news->getNewsById($id),
        ]);
    }
}
