<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Promo;
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
        $promos = Promo::all();
        return view('pelanggan.cart', compact('cart', 'promos'));
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $cart = session()->get('cart', []);
        $promoId = $request->input('promo_id');
        $promo = Promo::find($promoId);

        if (count($cart) === 0) {
            return redirect()->back()->with('error', 'Keranjang belanja Anda kosong.');
        }

        // Hitung total harga
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        // Terapkan diskon promo jika ada
        $promoDiscount = 0;
        if ($promo) {
            $promoDiscount = $totalPrice * ($promo->percentage / 100);
            $totalPrice -= $promoDiscount;
        }

        // Terapkan diskon berdasarkan level loyalitas
        $loyaltyDiscount = 0;
        if ($user->loyalty_level == 'Silver') {
            $loyaltyDiscount = $totalPrice * 0.05;
            $totalPrice *= 0.95;
        } elseif ($user->loyalty_level == 'Gold') {
            $loyaltyDiscount = $totalPrice * 0.10;
            $totalPrice *= 0.90;
        } elseif ($user->loyalty_level == 'Platinum') {
            $loyaltyDiscount = $totalPrice * 0.15;
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
        session()->put('checkout_details', [
            'total_price' => $totalPrice,
            'promo_discount' => $promoDiscount,
            'loyalty_discount' => $loyaltyDiscount,
            'promo' => $promo ? $promo->name : null,
        ]);

        return redirect()->route('pelanggan.landing')->with('success', 'Pesanan berhasil dibuat.');
    }
    public function calculateDiscount(Request $request)
    {
        $total = $request->input('total');
        $promoId = $request->input('promo_id');
        $promo = Promo::find($promoId);
        $user = Auth::user();

        $promoDiscount = 0;
        if ($promo) {
            $promoDiscount = $total * ($promo->percentage / 100);
        }

        // Terapkan diskon berdasarkan level loyalitas
        $loyaltyDiscount = 0;
        if ($user->loyalty_level == 'Silver') {
            $loyaltyDiscount = $total * 0.05;
            $finalTotal = $total - $promoDiscount - $loyaltyDiscount;
        } elseif ($user->loyalty_level == 'Gold') {
            $loyaltyDiscount = $total * 0.10;
            $finalTotal = $total - $promoDiscount - $loyaltyDiscount;
        } elseif ($user->loyalty_level == 'Platinum') {
            $loyaltyDiscount = $total * 0.15;
            $finalTotal = $total - $promoDiscount - $loyaltyDiscount;
        } else {
            $finalTotal = $total - $promoDiscount;
        }

        return response()->json([
            'success' => true,
            'promo_discount' => number_format($promoDiscount, 0, ',', '.'),
            'member_discount' => number_format($loyaltyDiscount, 0, ',', '.'),
            'final_total' => number_format($finalTotal, 0, ',', '.'),
        ]);
    }

}
