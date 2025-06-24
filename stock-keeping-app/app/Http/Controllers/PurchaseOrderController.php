<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $purchaseOrders = PurchaseOrder::get();
        return view('admin.purchase-order.purchase-order', compact('purchaseOrders'));
    }

    public function store(Request $request)
    {
        // Validate form inputs
        $request->validate([
            'date' => 'required|date',
            'order_no' => 'required|string|max:255|unique:purchase_orders,order_no',
            'notes' => 'nullable|string|max:1000',
        ]);

        // Create a new purchase order
        PurchaseOrder::create([
            'order_date' => $request->date,
            'order_no' => $request->order_no,
            'notes' => $request->notes,
        ]);

        // Redirect to index page with success message
        return redirect()->back()->with('success', 'Purchase order created successfully!');
    }
}
