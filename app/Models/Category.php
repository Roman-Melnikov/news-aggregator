<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function getCategories(): Collection
    {
        return DB::table($this->table)->get();
    }

    public function getNameByCategoryId(int $id): ?string
    {
        $name = (DB::table($this->table)
            ->where($this->table . '.id', '=', $id)
            ->select('title')
            ->get());

        return $name[0]->title;
    }
}
