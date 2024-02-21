<?php

declare(strict_types=1);

namespace App\Repositories;
use App\Repositories\BaseRepositories;
use App\Models\Category;

class CategoryRepository
{

    public function __construct()
    {
        $this->category = new Category;
    }

    public function getRandomIds() {
        return $this->category->select('id')->inRandomOrder()->take(2);
    }
}