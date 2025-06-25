<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\PurchaseReturn;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseReturnController extends Controller
{
    public function create()
    {
        $purchaseOrders = PurchaseOrder::all();
        $suppliers = Supplier::all();

        return view('admin.purchase_returns.create', compact('purchaseOrders', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'purchase_order_id' => 'required|exists:purchase_orders,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'return_date' => 'required|date',
            'total_return_amount' => 'required|numeric|min:0',
            'reason' => 'nullable|string',
        ]);

        PurchaseReturn::create($request->all());

        return redirect()->back()->with('success', 'Purchase Return created successfully!');
    }
}
