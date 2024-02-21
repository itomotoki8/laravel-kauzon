<?php

declare(strict_types=1);

namespace App\Services;
use App\Services\BaseService;
use App\Repositories\ItemRepository;

class ItemService extends BaseService
{

    public function __construct()
    {
        $this->itemRepository = new ItemRepository();
    }
}