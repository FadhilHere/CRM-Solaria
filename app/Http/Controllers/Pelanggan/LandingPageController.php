<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class LandingPageController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('pelanggan.landing', compact('menus'));
    }
    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return view('pelanggan.menu_detail', compact('menu'));
    }
    public function profile()
    {
        return view('pelanggan.profile');
    }

}
