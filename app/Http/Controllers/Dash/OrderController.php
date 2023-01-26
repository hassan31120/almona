<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        if (count($orders) > 0) {
            return response()->json([
                'success' => true,
                'orders' => OrderResource::collection($orders)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no orders yet'
            ], 404);
        }
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->delete();
            return response()->json([
                'success' => true,
                'msg' => 'order has been deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such order'
            ], 404);
        }
    }
}
