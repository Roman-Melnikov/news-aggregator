<?php

declare(strict_types=1);

namespace App\Models;

class News
{

    public static function getNews(): array
    {
        $quantityCategories = 5;
        $quantityNewsOneCategory = 4;

        for ($i = 1; $i <= $quantityCategories; $i++) {
            for ($j = 1; $j <= $quantityNewsOneCategory; $j++) {
                $id = 0;
                $news[] = [
                    'id' => ++$id,
                    'title' => \fake()->jobTitle(),
                    'description' => \fake()->realText(100),
                    'author' => \fake()->userName(),
                    'created_at' => \now()->format('d-m-Y H:m'),
                    'category_id' => $i
                ];
            }
        }
        return $news;
    }

    public static function getNewsById(int $id): ?array
    {
        $news = static::getNews();

        foreach ($news as $item) {
            if ($item['id'] === $id) {
                return $item;
            }
        }
        return null;
    }

    public static function getNewsByICategoryId(int $id): array
    {
        $news = static::getNews();

        $categoryNews = [];
        foreach ($news as $item) {
            if ($item['category_id'] === $id) {
                $categoryNews[] = $item;
            }
        }
        return $categoryNews;
    }
}
