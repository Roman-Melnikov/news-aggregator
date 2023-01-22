<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{

    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $categories = new Categories();

        return \view('categories', [
            'categories' => $categories->getCategories()
        ]);
    }

    public function show(int $id)
    {
        $categoryNews = News::getNewsByICategoryId($id);
        $name = (new Categories())->getNameByCategoryId($id);

        return \view('categoryNews', [
            'categoryNews' => $categoryNews,
            'name' => $name
        ]);
    }
}
