<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sourse extends Model
{
    use HasFactory;

    protected $table = 'sourses';

    protected $fillable = [
        'name',
        'url',
    ];
}
