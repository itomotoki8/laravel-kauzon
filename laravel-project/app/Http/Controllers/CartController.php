<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Review;
use App\Models\History;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function index(Request $request) {
        if(!$request->cookie('cart')) return view('cart');
        $carts = json_decode($request->cookie('cart'),true);
        $num_array = [];
        $id_array = [];
        
        foreach($carts as $cart) {
            $id_array[] = $cart['id'];
            $num_array[] = $cart['num'];
        }

        $items = Item::select('id','name','price','body','img_url','buy_num')->with('review:star,item_id')->whereIn('id',$id_array)->orderByRaw('FIELD(id, '.implode(',', $id_array).')')
        ->get();


        foreach($items as $index => $item) {
          $sumStar = 0;
          $count = count($item->review);
          $avgStar = 0;
          if($count) {
            foreach($item->review as $oneReview) {
                $sumStar += $oneReview['star'];
            }
            $avgStar = $sumStar / $count;
          }
            $item->starAvg = $avgStar ? number_format($avgStar,1) : "0" ;
            $item->starCount = $count;
            $body = explode("\n",$item->body);
            $item->body = $body;
            $item->num = $num_array[$index];                
            unset($item['review']);
        }
        $items = $items->reverse();
        return view('cart',compact('items'));
    }

    
    public function total_count (Request $request) {
        $carts = json_decode($request->cookie('cart'),true);
        $num_array = [];
        $id_array = [];
        
        foreach($carts as $cart) {
            $id_array[] = $cart['id'];
            $num_array[] = $cart['num'];
        }

        $item_count = array_sum($num_array);

        $items = Item::select('price','id')->whereIn('id',$id_array)->orderByRaw('FIELD(id, '.implode(',', $id_array).')')
        ->get();

        $total = 0;

        foreach($items as $index => $item) {
            $price = $item->price * $num_array[$index];
            $total += $price;
        }
        
        $total_count = [];

        $total_count['total'] = $total;
        $total_count['count'] = $item_count;
        
        return $total_count;
    }

    public function delete($id, Request $request) {
        return redirect(route('cart'));
    }
    
    public function checkout(Request $request) {

      $stripe = new \Stripe\StripeClient([
        "api_key" => env('STRIPE_SECRET')
      ]);

      $num_array = [];
      $id_array = [];
      
      if($request->num) {
        $num_array[] = $request->num;
        $id_array[] = $request->id;
      }else {
        $carts = json_decode($request->cookie('cart'),true);
        foreach($carts as $cart) {
            $id_array[] = $cart['id'];
            $num_array[] = $cart['num'];
        }
      }


      $items = Item::select('name','price')->whereIn('id',$id_array)->orderByRaw('FIELD(id, '.implode(',', $id_array).')')->get();

      foreach ($items as $index => $item) {
        $item -> num = $num_array[$index];
      }

      $line_items = [];

      foreach ($items as $item) {
        $line_items[] = [
          'price_data' => [
            'currency' => 'JPY',
            'product_data' => [
              'name' => $item->name,
            ],
            'unit_amount' => $item->price,
          ],
          'quantity' => $item->num,
        ];
      }

      $route = $request->num ? route('success2',['num' => $request->num,'id' => $request->id],true) : route('success',[],true);

      $checkout_session = $stripe->checkout->sessions->create([
        'line_items' => $line_items,
        'mode' => 'payment',
        'success_url' => $route,
        'cancel_url' => route('cart',[],true),
      ]);

      return redirect($checkout_session->url);
    }

    public function success() {
      Cookie::queue(Cookie::forget('cart'));
      return view('success');
    }


    public function success2(Request $request) {
      $user_id = Auth::user()->id;

          // $history = new History;
          // $history->user_id = $user_id;
          // $history->item_id = $request->query('id');
          // $history->num = $request->query('num');
          // $history->save();
          return view('success2');
    }
}
