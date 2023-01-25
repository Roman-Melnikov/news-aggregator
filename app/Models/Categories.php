<?php

namespace App\Models;

class Categories
{
    private $categories = [
        [
            'id' => 1,
            'name' => 'sport',
            'description' => 'Новости про спорт'
        ],
        [
            'id' => 2,
            'name' => 'wellness',
            'description' => 'Новости о здоровом образе жизни'
        ],
        [
            'id' => 3,
            'name' => 'politics',
            'description' => 'Новости о политике'
        ],
        [
            'id' => 4,
            'name' => 'culture',
            'description' => 'Новости культуры'
        ],
        [
            'id' => 5,
            'name' => 'travel',
            'description' => 'О путешествиях'
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
