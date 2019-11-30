<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Services\MenuService;
use App\Services\RestoService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MenuService $service, RestoService $restoService)
    {
        $restoId = 1;
        $menus = $service->getMenuWithCategories($restoId);

        return view('home', compact('menus', 'restoId'));
    }
}
