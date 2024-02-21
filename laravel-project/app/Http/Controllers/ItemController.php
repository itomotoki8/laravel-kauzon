<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use App\Services\ItemService;
use App\Repositories\ItemRepository;


class ItemController extends Controller
{

    public function __construct()
      {
        $this->itemService = new ItemService();
        $this->itemRepository = new ItemRepository();
      }

    public function index($id)
    {
      $item = $this->itemRepository->getItem($id);
      return view('item',compact('item'));
    }


    public function search(Category $category,Request $request) {
      if(isset($request->word)) {
        return $category->select('name','id')->where('name','like',"%$request->word%")->take(10)->get();
      }
      return $category->select('name','id')->inRandomOrder()->take(10)->get();
    }

    
    public function create_confirmation (Request $request) {
      $price = $request->price;
      $thistext = explode("\n",$request->this);;
      $syoukai = $request->syoukai;
      $name = $request->name;
      return view('create_confirmation',compact('price','thistext','syoukai','name'));
    }
    
    public function add (Request $request) {
      $item = new Item;
      $item->name = 'サイダー';
      $item->price = 200;
      $item->category_id = 2;
      $item->body = $request->text;
      $item->img_url = 'https://m.media-amazon.com/images/I/71tCPgMf5AL._AC_SY741_PIbundle-24,TopRight,0,0_SH20_.jpg';
      $item->explanation = $request->text;
      $item->save();
    }

    public function create () {
      $item = Item::find(10);

      return view('create',compact('item'));
    }

    public function review($id) {
      $item = Item::select('name','img_url')->find($id);
      $user_review = Review::select('star','review','title','updated_at')->where([['user_id',Auth::user()->id],['item_id',$id]])->first();
      if($user_review) {
        return view ('review',compact('item','user_review'));
      }
      
      return view('review',compact('item'));
    }
}
