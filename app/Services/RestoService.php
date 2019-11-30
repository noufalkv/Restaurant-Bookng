<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class RestoService
{
    public function userRestoAndTables()
    {
        return Auth::user()
            ->restaurants()
            ->get();
    }
}
