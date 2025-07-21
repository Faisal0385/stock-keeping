<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PurchaseOrder;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $orders = PurchaseOrder::latest()->paginate(10);
        $suppliers = Supplier::where('status', '=', true)->get();
        return view('admin.purchase-orders', compact('orders', 'suppliers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'notes' => 'nullable|string',
        ]);

        // Generate next order number
        $latestOrder = PurchaseOrder::latest('id')->first();
        $nextOrderNo = $latestOrder ? ((int) $latestOrder->order_no + 1) : 1001;

        $validated['order_no'] = $nextOrderNo;

        PurchaseOrder::create($validated);

        return redirect()->back()->with('success', 'Purchase Order created successfully with Order No: ' . $nextOrderNo);
    }
}
