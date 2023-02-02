<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{

    public function index(Categories $categories): View
    {
        return \view('categories.index', [
            'categories' => $categories->getCategories()
        ]);
    }

    public function show(int $id)
    {
        $categoryNews = News::getNewsByICategoryId($id);
        $name = (new Categories())->getNameByCategoryId($id);

        return \view('categories.show', [
            'categoryNews' => $categoryNews,
            'name' => $name
        ]);
    }
}
