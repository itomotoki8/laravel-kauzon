<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Repositories\CategoryRepository;
use App\Models\Slider;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->category = new CategoryService();
    }
    
    public function index () {

        //カテゴリIDをランダムに二つ取得
        $category_ids = $this->category->getRandomIds();
           
        $items = $category_ids->map(function ($id) {
            // return Item::where('category_id',$id->id)->take(10)->get();
            return array(
                'item' => Category::find($id->id)->items()->take(10)->get(),
                'category_id' => $id->id
            );
        });

        $categories = Category::select('id','img_url')->whereNotNull('img_url')->get();
        
        $sliders = Slider::get();
        

        return view('index',compact('sliders','items','categories'));
    }
}