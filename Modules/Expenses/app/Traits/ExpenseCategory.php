<?php

namespace Modules\Expenses\App\Traits;

enum ExpenseCategory : string
{
    case FOOD = 'food';
    case TRAVEL = 'travel';
    case OFFICE = 'office';
    case OTHER = 'other';
}
