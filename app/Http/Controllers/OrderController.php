<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\Orders\StoreOrder;
use App\Models\Drug;
use App\Models\Order;
use App\Utils\Utils;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth as JWTAuth;

class OrderController extends Controller
{
    public function index()
    {
        try {
            $currentUser = JWTAuth::parseToken()->authenticate();
            $orders = Order::where('user_id', $currentUser->id)->orderBy('created_at', 'DESC')->get();
            return Utils::returnData($orders);
        } catch (\Exception $e) {
            return Utils::handleException($e);
        }
    }

    public function show($id)
    {
        try {
            $currentUser = JWTAuth::parseToken()->authenticate();
            $order = Order::findOrFail($id);
            if ($order->user_id !== $currentUser->id) {
                return Utils::returnError('You can only see your own orders', 403);
            }
            return Utils::returnData($order);
        } catch (\Exception $e) {
            return Utils::handleException($e);
        }
    }

    public function store(StoreOrder $request)
    {
        try {
            $token = JWTAuth::getToken();
            if ($token) {
                $currentUser = JWTAuth::parseToken()->authenticate();
                if ($currentUser) {
                    $currentUser->address = $request->address;
                    $currentUser->city = $request->city;
                    $currentUser->post_code = $request->post_code;
                    $currentUser->save();
                }
            };

            $filteredRequest = $request->only([
                'additional_notes', 'phone', 'address', 'post_code', 'city',
            ]);
            $deliveryFee = 9.9;

            $order = new Order();
            $order->fill($filteredRequest);
            $order->delivery_fees = $deliveryFee;
            $order->total = $deliveryFee;
            $order->user_id = isset($currentUser) ? $currentUser->id : null;
            $order->save();
            $order->refresh();

            $total = 0;

            foreach ($request->items as $item) {
                $drug = Drug::find($item['id']);
                $total = $total + $drug->price;
            }
            $order->sub_total = $total;
            $order->total = $order->sub_total + $deliveryFee;
            $order->save();
            return Utils::returnSuccess('Your order has been registered with success');
        } catch (\Exception $e) {
            return Utils::handleException($e);
        }
    }
}
