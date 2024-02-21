<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReviewRequest;


class ReviewController extends Controller
{   

    public function __construct()
    {
        $this->review = new Review();
    }
    
    public function reviews(Request $request)
    {
        $type = $request->type;
        $id = $request->id;

        if($type == 'new') {
            $review =$this->review::select('star','review','created_at','user_id','title')->with('user:name,id')->where('item_id',$id)->orderBy('created_at','desc')->get();
            return response()->json($review->toArray()); 
        }else if($type == "top") {
            $review = $this->review::select('star','review','created_at','user_id','title')->with('user:name,id')->where('item_id',$id)->orderBy('star','desc')->get();
            return response()->json($review->toArray()); 
        }else {
            $review = $this->review::select('star','review','created_at','user_id','title')->with('user:name,id')->where('item_id',$id)->orderBy('star','asc')->get();
            return response()->json($review->toArray()); 
        }
    }

    // レビューを登録
    public function readReview (Review $review,ReviewRequest $request,$id) {
        $request->session()->regenerateToken();
        $user_id = Auth::user()->id;
        $user_review = Review::where([['user_id',Auth::user()->id],['item_id',$id]])->first();
        if($user_review) {
            $user_review->fill(
                [
                    'user_id' => $user_id,
                    'item_id' => $id,
                    'star' => $request->score,
                    'review' => $request->body,
                    'title' => $request->title,
                ]
                );
            $user_review->save();
            return redirect('compreate');
        }

        $this->review->fill(
            [
                'user_id' => $user_id,
                'item_id' => $id,
                'star' => $request->score,
                'review' => $request->body,
                'title' => $request->title,
            ]
            );
        $this->review->save();
        return redirect('compreate');
    }

    public function compreate ()
    {
        return view('/compreate');
    }
}
