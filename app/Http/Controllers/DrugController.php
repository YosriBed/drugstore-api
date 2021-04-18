<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Drug;
use App\Utils\Utils;

class DrugController extends Controller
{
    public function index()
    {
        try {
            $drugs = Drug::with(['ingredients', 'category'])->get();
            return Utils::returnData($drugs);
        } catch (\Exception $e) {
            return Utils::handleException($e);
        }
    }

    public function show($id)
    {
        try {
            $drug = Drug::with(['ingredients', 'category'])->findOrFail($id);
            return Utils::returnData($drug);
        } catch (\Exception $e) {
            return Utils::handleException($e);
        }
    }
}
