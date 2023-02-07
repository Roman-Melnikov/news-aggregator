<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('sourses')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'name' => \fake()->title(),
                'url' => \fake()->url(),
            ];
        }
        return $data;
    }
}
