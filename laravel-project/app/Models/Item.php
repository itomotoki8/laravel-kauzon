<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','price','explanation','body','img_url','num','buy_num','flag',
    ];
    
    public function review () {
        return $this->hasMany(Review::class,'item_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    
    public function getCountReview() {
        return isset($this->review) ? count($this->review) : 0;
    }

    public function getAvgStar() {
        $countReview = $this->getCountReview();
        if(!$countReview){
            return $countReview;
        }

        $sumStar = 0;
        foreach($this->review as $review) {
            $sumStar += $review->star;
        }

        return number_format($sumStar / $countReview,1);
    }

    public function getBody() {
        return explode("\n",$this->body);
    }
 }
