<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\BoxType;


class Box extends Model
{
    /** @use HasFactory<\Database\Factories\BoxFactory> */
    use HasFactory;

    public static function getEnumTypes(): array
    {
        return array_column(BoxType::cases(), 'value');
    }
}