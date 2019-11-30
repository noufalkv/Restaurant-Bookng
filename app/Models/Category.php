<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
