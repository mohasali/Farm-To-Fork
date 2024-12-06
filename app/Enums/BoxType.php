<?php
namespace App\Enums;

enum BoxType: string
{
    case S = 'Seasonal';
    case M = 'Meat & Dairy';
    case D = 'Dynamic Pricing';
    case L = 'Locally Sourced';
    case C = 'Cultural Recipe';

}
