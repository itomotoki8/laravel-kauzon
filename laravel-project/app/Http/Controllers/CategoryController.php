<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Item;
use App\Models\Category;
use App\Models\Review;


class CategoryController extends Controller
{
    public function index ($id)
    {
        $category_name = Category::select('name')->find($id)->name;

        $collection = collect(Category::find($id)->items);

        //paginationの件数指定
        $perPage = 8;

        $page = Paginator::resolveCurrentPage('page');
        $pageData = $collection->slice(($page -1) * $perPage,$perPage);
        $options = [
          'path' => Paginator::resolveCurrentPath(),
          'pageName' => 'page'
        ];
        $items = new LengthAwarePaginator($pageData, $collection->count(),$perPage,
        $page,$options);
        
        foreach($items as $item) {
          $item -> review = Review::select('star')->where('item_id',$item->id)->get();
        }

        foreach($items as $item) {
            $count = count($item->review);
            $starAvg = 0;
            if(count($item->review)){
                $countStar = 0;
                foreach($item->review as $rev) {
                  $countStar += $rev->star;
                }
                $starAvg =  $countStar / $count;
              }
        
              $item->starCount = $count;
              $item->starAvg = $starAvg ? number_format($starAvg,1) : "0  ";
              unset($item['review']);
        }
        return view('category',compact('items','category_name'));
    }

    public function no_category()
    {
      return view('no_category');
    }

    public function category_search(Request $request)
    {
      // 検索された名前があるか確認のためid取得
      $itemId = Category::select('id')->where('name',$request->word)->first();
      $word = $request->word;

      // 名前が入力されていなければindexにリダイレクト
      if(!$request->word) {
        return redirect(route('index'));
      }

      // 検索された名前が存在しなければエラーページにとばす
      if(!$itemId) {
        return redirect()->route('no_category')->with(compact('word'));
      }
      
      //wordを変数として渡したい
      return redirect()->route('category',$itemId)->with(compact('word'));
    }
}
