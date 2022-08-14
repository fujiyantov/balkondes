<?php

use App\Models\Letter;
use App\Models\LetterHistories;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

function notifCount()
{

    $count = Transaction::where('is_read', 0)->count();

    return $count;
}
