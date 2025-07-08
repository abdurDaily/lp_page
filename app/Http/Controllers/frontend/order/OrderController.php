<?php

namespace App\Http\Controllers\frontend\order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    /**INDEX */
    public function index()
    {
        // Fetch divisions
        $response = Http::get('https://bdapi.vercel.app/api/v.1/division');
        $divisions = $response->json('data');

        // Fetch districts
        $district_response = Http::get('https://bdapi.vercel.app/api/v.1/district');
        $districts = $district_response->json('data');

        //Fetch Upazilla
        $upazilla_response = Http::get('https://bdapi.vercel.app/api/v.1/upazilla');
        $upazillas = $upazilla_response->json('data');


        // If you want to check data, temporarily dump like:
        // dd($divisions, $districts);

        return view('frontend.order.order', compact('divisions', 'districts', 'upazillas'));
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_phone' => 'required|string|max:255',
            'client_address' => 'required|string',
            'division_id' => 'required',
            'district_id' => 'required',
            //'upazilla_id' => 'required',
            'packages' => 'required|array|min:1',
            'packages.*.name' => 'required|string',
            'packages.*.qty' => 'required|integer|min:1',
            'packages.*.price' => 'required|numeric|min:0',
            'total_price' => 'required|numeric|min:0',
        ]);


        $order = Order::create([
            'client_name' => $validated['client_name'],
            'client_phone' => $validated['client_phone'],
            'client_address' => $validated['client_address'],
            'division_id' => $validated['division_id'] ?? null,
            'district_id' => $validated['district_id'] ?? null,
            'upazilla_id' => $validated['upazilla_id'] ?? null,
            'packages' => $validated['packages'],
            'total_price' => $validated['total_price'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Order placed successfully!',
            'order_id' => $order->id,
        ]);
    }
}
