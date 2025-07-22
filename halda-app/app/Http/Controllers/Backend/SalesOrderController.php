<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;

class SalesOrderController extends Controller
{
    public function index()
    {
        $orders = Sale::latest()->paginate(10);
        // $suppliers = Supplier::where('status', '=', true)->get();
        return view('admin.sales-orders', compact('orders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sale_date' => 'required|date',
            'cutomer_id' => 'nullable|exists:customers,id',
            'notes' => 'nullable|string',
        ]);

        // Generate next order number
        $latestOrder = Sale::latest('id')->first();
        $nextOrderNo = $latestOrder ? ((int) $latestOrder->sale_code + 1) : 1001;

        $validated['sale_code'] = $nextOrderNo;

        Sale::create($validated);

        return redirect()->back()->with('success', 'Sale Order created successfully with Order No: ' . $nextOrderNo);
    }
}
