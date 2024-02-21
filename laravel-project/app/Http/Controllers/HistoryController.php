<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use Illuminate\Support\Facades\Auth;



class HistoryController extends Controller
{
    public function index () {
        $user_id = Auth::user()->id;
        $histories = History::select('id','created_at','item_id')->with('item:id,name,img_url')->where('user_id',$user_id)->get();
        $histories = $histories->reverse();
        return view('history',compact('histories'));
    }
}
