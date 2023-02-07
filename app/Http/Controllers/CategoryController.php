<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{

    public function index(Category $categories): View
    {
        return \view('categories.index', [
            'categories' => $categories->getCategories()
        ]);
    }

    public function show(int $id, News $news, Category $category): View
    {

        return \view('categories.show', [
            'categoryNews' => $news->getNewsByCategoryId($id),
            'name' => $category->getNameByCategoryId($id),
        ]);
    }
}
