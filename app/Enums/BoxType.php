<?php
namespace App\Enums;

enum BoxType: string
{
    case S = 'Seasonal';
    case M = 'Protien';
    case R = 'Reduced';
    case L = 'Locally Sourced';
    case C = 'Cultural Recipe';

}
