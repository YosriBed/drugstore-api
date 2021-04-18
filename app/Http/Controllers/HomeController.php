<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Utils\Utils;

use function Psy\debug;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $drugs = Category::with(['drugs', 'drugs.ingredients'])->get();
            return Utils::returnData($drugs);
        } catch (\Exception $e) {
            return Utils::handleException($e);
        }
    }
}
