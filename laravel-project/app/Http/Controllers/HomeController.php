<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Item;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index () {
        $sliders = Slider::get();
        $items = Item::where('category_id',1)->take(10)->get();

        return view('/index',compact('sliders','items'));
    }
}
