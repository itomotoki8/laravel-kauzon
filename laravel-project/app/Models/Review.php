<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','item_id','star','title','review'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y/m/d',
    ];

    public function user () {
        return $this->belongsTo(User::class,'user_id');
    }

    public function getReviews($request)
    {

        //なぜかモデルに引数渡せない
        $type = $request->type;
        $id = $request->id;

        return $this::where('item_id',$id)->get();

        if($type == 'new') {
            $review = $this::where('item_id',$id)->orderBy('created_at','desc')->get();
            return response()->json($review->toArray()); 
        }else if($type == "top") {
            $review = $this::where('item_id',$id)->orderBy('star','desc')->get();
            return response()->json($review->toArray()); 
        }else {
            $review = $this::where('item_id',$id)->orderBy('star','asc')->get();
            return response()->json($review->toArray()); 
        }
    }
}