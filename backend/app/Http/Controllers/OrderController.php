<?php

namespace App\Http\Controllers;

use App\Models\OrderContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Nette\NotImplementedException;

class OrderController extends Controller
{
    public function getAllOrders(){
        return Order::all();
    }
    public function getOrders(){
        return Order::where('user_id', '=', Auth::user()->id)->get();
    }
    function getOrder($id){
        return Order::find($id);
    }
    public function addOrder(Request $request) {
        $request->validate([
            "address" => "required|string",
            "content" => "required|array"
        ]);
        // super smart algorithm to compute time to deliver order based on address in request, gps data and current situation in the world
        $delivery_date = new \DateTime();
        $delivery_date = $delivery_date
                                ->add(\DateInterval::createFromDateString("7 days"))
                                ->format("Y-m-d H:m");
        //getting get code
        $get_code = random_int(100000, 999999);
        $order = Order::create([
            "user_id" => Auth::user()->id,
            "delivery_date" => $delivery_date,
            "get_code" => $get_code,
            "delivery_address" => $request->address,
        ]);
        $content = [];
        foreach($request->content as $orderItem){
            array_push($content, new OrderContent([
                "product_id" => $orderItem["product_id"],
                "count" => $orderItem["count"]
            ]));
        }
        $order->content()->saveMany($content);
        return Order::find($order->id);
    }
        function editOrder(Request $request, $id) {
        // im too lazy to implement it now soo
        throw new NotImplementedException("im too lazy to implement this function now");
    }
    public function deleteOrder(Request $request, $id) {
        $order = Order::find($id);
        $order->delete();
        return response()->json(['data' => ['message' => "Deleted succesfully"]]);
    }
}

