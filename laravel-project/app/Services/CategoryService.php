<?php

declare(strict_types=1);

namespace App\Services;
use App\Services\BaseService;
use App\Repositories\CategoryRepository;

class CategoryService extends BaseService
{

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();   
    }

    public function getRandomIds() 
    {
        return $this->categoryRepository->getRandomIds()->get();
    }
}