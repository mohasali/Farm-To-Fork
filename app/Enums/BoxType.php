<?php
namespace App\Enums;

enum BoxType: string
{
    case S = 'Seasonal';
    case M = 'Protein';
    case R = 'Reduced';
    case L = 'Locally Sourced';
    case C = 'Cultural Recipe';

}
