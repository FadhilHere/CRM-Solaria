<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $quantity = $request->input('quantity');

        // Pastikan cart disimpan di session
        $cart = session()->get('cart', []);

        // Jika item sudah ada di cart, tambahkan quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            // Jika item belum ada di cart, tambahkan item baru
            $cart[$id] = [
                'id' => $menu->id,
                'name' => $menu->name,
                'quantity' => $quantity,
                'price' => $menu->price,
                'picture' => $menu->picture,
            ];
        }

        // Simpan cart ke session
        session()->put('cart', $cart);

        return redirect()->route('menus.detail', $id)->with('success', 'Menu berhasil ditambahkan ke keranjang');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('pelanggan.cart', compact('cart'));
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $cart = session()->get('cart', []);

        if (count($cart) === 0) {
            return redirect()->back()->with('error', 'Keranjang belanja Anda kosong.');
        }

        // Hitung total harga
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        // Terapkan diskon berdasarkan level loyalitas
        if ($user->loyalty_level == 'Silver') {
            $totalPrice *= 0.95;
        } elseif ($user->loyalty_level == 'Gold') {
            $totalPrice *= 0.90;
        } elseif ($user->loyalty_level == 'Platinum') {
            $totalPrice *= 0.85;
        }

        // Buat pesanan baru
        $order = Order::create([
            'user_id' => $user->id,
            'order_date' => now(),
            'status' => 'pending',
            'total_price' => $totalPrice,
        ]);

        // Buat detail pesanan
        foreach ($cart as $item) {
            if (isset($item['id'])) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'menu_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            } else {
                return redirect()->back()->with('error', 'Terdapat item dalam keranjang yang tidak valid.');
            }
        }

        // Tambahkan total harga ke total_spent pengguna dan update level loyalitas
        $user->total_spent += $totalPrice;
        $user->updateLoyaltyLevel();

        session()->forget('cart');

        return redirect()->route('pelanggan.landing')->with('success', 'Pesanan berhasil dibuat.');
    }
}
