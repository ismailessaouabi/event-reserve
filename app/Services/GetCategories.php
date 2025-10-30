<?php

namespace App\Services;

use App\Models\Category;

class GetCategories
{
    public function getAllCategories()
    {
        return Category::all();
    }
}
