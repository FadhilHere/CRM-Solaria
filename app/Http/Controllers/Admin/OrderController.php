<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Menu;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function changeStatus($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'selesai';
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil diubah menjadi selesai.');
    }
    public function index()
    {
        $orders = Order::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with(['orderDetails.menu'])->orderBy('created_at', 'desc')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $totalPrice = 0;
        $discount = 0;

        // Calculate total price
        foreach ($request->menus as $menu) {
            $menuItem = Menu::find($menu['menu_id']);
            $totalPrice += $menuItem->price * $menu['quantity'];
        }

        // Apply discount based on loyalty level
        $totalSpent = $user->orders()->sum('total_price');
        $averageSpent = $totalSpent / max(1, $user->orders()->count());

        if ($averageSpent >= 200000 && $averageSpent < 500000) {
            $discount = 0.05; // Silver
        } elseif ($averageSpent >= 500000 && $averageSpent < 1000000) {
            $discount = 0.10; // Gold
        } elseif ($averageSpent >= 1000000) {
            $discount = 0.15; // Platinum
        }

        $totalPrice -= $totalPrice * $discount;

        // Create order
        $order = Order::create([
            'user_id' => $user->id,
            'order_date' => now(),
            'status' => 'pending',
            'total_price' => $totalPrice,
        ]);

        // Create order details
        foreach ($request->menus as $menu) {
            OrderDetail::create([
                'order_id' => $order->id,
                'menu_id' => $menu['menu_id'],
                'quantity' => $menu['quantity'],
                'price' => $menuItem->price,
            ]);
        }

        return response()->json(['success' => true, 'order' => $order]);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(['success' => true, 'message' => 'Order deleted successfully']);
    }
}
