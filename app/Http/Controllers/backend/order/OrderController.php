<?php

namespace App\Http\Controllers\backend\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller

{
    //**BACKEND OREDER INDEX */
    public function index()
    {
        // Fetch all orders from DB
        $orders = Order::latest()->get();

        // Load BDAPI data
        $divisions = Http::get('https://bdapi.vercel.app/api/v.1/division')->json('data');
        $districts = Http::get('https://bdapi.vercel.app/api/v.1/district')->json('data');
        $upazillas = Http::get('https://bdapi.vercel.app/api/v.1/upazilla')->json('data');

        return view('backend.order.index', compact(
            'orders',
            'divisions',
            'districts',
            'upazillas'
        ));
    }


    public function toggleStatus($id)
    {
        $order = Order::findOrFail($id);

        // Toggle the action status (0 => 1, 1 => 0)
        $order->action = $order->action ? 0 : 1;
        $order->save();

        $message = $order->action ? 'Order marked as Confirmed!' : 'Order marked as Pending!';

        return redirect()->back()->with('success', $message);
    }
}
