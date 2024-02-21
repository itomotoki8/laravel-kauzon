<?php

declare(strict_types=1);

namespace App\Repositories;
use App\Repositories\BaseRepositories;
use App\Models\Item;


class ItemRepository extends BaseRepository
{

    public function __construct()
    {
        $this->item = new Item();
    }

    public function getItem($id) {
        return $this->item->where('flag',1)->with('review:star,item_id')->find($id);
    }
}