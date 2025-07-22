<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseItemController extends Controller
{
    public function index($id)
    {
        $products = Product::where('status', '=', true)->get();
        $purchaseOrderItems = PurchaseOrderItem::get();
        return view('admin.purchase-items', compact('products', 'id', 'purchaseOrderItems'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'purchase_order_id' => 'required|exists:purchase_orders,id',
            'date' => 'required|date',
            'product_id' => 'required|exists:products,id',
            'received_qty' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            $product = Product::findOrFail($validated['product_id']);

            $validated['unit_price'] = $product->purchase_price;
            $validated['subtotal'] = $validated['received_qty'] * $product->purchase_price;

            // Save the purchase order item
            PurchaseOrderItem::create($validated);

            // Update the product stock
            $product->stock += $validated['received_qty'];
            $product->save();

            // Update the purchase order's total amount
            $purchaseOrder = PurchaseOrder::findOrFail($validated['purchase_order_id']);
            $purchaseOrder->order_amount = $purchaseOrder->items()->sum('subtotal');
            $purchaseOrder->save();

            DB::commit();

            return redirect()->back()->with('success', 'Purchase Order Item added, product stock and order amount updated.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Something went wrong. Transaction rolled back. ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $item = PurchaseOrderItem::findOrFail($id);

            // Get related product and purchase order
            $product = Product::findOrFail($item->product_id);
            $purchaseOrder = PurchaseOrder::findOrFail($item->purchase_order_id);

            // Subtract stock
            $product->stock -= $item->received_qty;
            if ($product->stock < 0) {
                $product->stock = 0; // Optional safeguard
            }
            $product->save();

            // Delete the item
            $item->delete();

            // Recalculate order amount
            $purchaseOrder->order_amount = $purchaseOrder->items()->sum('subtotal');
            $purchaseOrder->save();

            DB::commit();

            return redirect()->back()->with('success', 'Purchase Order Item deleted and stock/order updated.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Delete failed. Transaction rolled back. ' . $e->getMessage());
        }
    }
}
