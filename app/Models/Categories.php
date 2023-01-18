<?php

namespace App\Models;

class Categories
{
    private $categories = [
        [
            'id' => 1,
            'name' => 'sport'
        ],
        [
            'id' => 2,
            'name' => 'wellness'
        ],
        [
            'id' => 3,
            'name' => 'politics'
        ],
        [
            'id' => 4,
            'name' => 'culture'
        ],
        [
            'id' => 5,
            'name' => 'travel'
        ],
    ];

    public function getCategories(): array
    {
        return $this->categories;
    }

    public function getNameByCategoryId(int $id): ?string
    {
        foreach ($this->categories as $item) {
            if ($item['id'] === $id) {
                return $item['name'];
            }
        }
        return null;
    }
}
