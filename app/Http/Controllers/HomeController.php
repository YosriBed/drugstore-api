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
            $data = ['API' => "API SERVER IS RUNNING"];
            return Utils::returnData($data);
        } catch (\Exception $e) {
            return Utils::handleException($e);
        }
    }
}
