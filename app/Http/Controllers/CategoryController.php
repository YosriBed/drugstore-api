<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Utils\Utils;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            $categories = Category::with(['drugs', 'drugs.ingredients'])->get();
            return Utils::returnData($categories);
        } catch (\Exception $e) {
            return Utils::handleException($e);
        }
    }

    public function show($id)
    {
        try {
            $category = Category::with(['drugs', 'drugs.ingredients'])->findOrFail($id);
            return Utils::returnData($category);
        } catch (\Exception $e) {
            return Utils::handleException($e);
        }
    }
}
