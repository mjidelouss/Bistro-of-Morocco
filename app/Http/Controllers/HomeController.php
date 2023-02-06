<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function display()
    {
        return view('home');
    }

    public function index()
    {
        //
        $items = Menu::join('categories', 'menus.category_id', '=', 'categories.id')
             ->select('menus.*', 'categories.category')
             ->latest()
             ->paginate(5);
            $itemCount = Menu::count();
            $userCount = User::count();
            $categories = Category::all();
        return view('home',compact('items', 'itemCount', 'userCount', 'categories'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

}
