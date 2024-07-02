<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Menu;
use App\Models\Promo;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalOrders = Order::count();
        $totalMenus = Menu::count();
        $totalPromos = Promo::count();

        // Ambil data penjualan per bulan
        $monthlySales = Order::select(
            DB::raw('count(id) as sales'),
            DB::raw('MONTH(created_at) as month')
        )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $salesData = array_fill(0, 12, 0);
        foreach ($monthlySales as $sale) {
            $salesData[$sale->month - 1] = $sale->sales;
        }

        // Ambil data kategori (preferences) yang paling banyak dipesan
        $categoryPreferences = OrderDetail::select(
            'menus.category as category_name',
            DB::raw('count(order_details.menu_id) as orders_count')
        )
            ->join('menus', 'order_details.menu_id', '=', 'menus.id')
            ->groupBy('menus.category')
            ->orderBy('orders_count', 'desc')
            ->get();

        // Ambil data pelanggan berdasarkan loyalty_level
        $loyaltyLevels = User::select(
            'loyalty_level',
            DB::raw('count(id) as count')
        )
            ->whereIn('loyalty_level', ['Bronze', 'Silver', 'Gold', 'Platinum'])
            ->groupBy('loyalty_level')
            ->orderBy('count', 'desc')
            ->get();

        return view('admin.dashboard', compact('totalUsers', 'totalOrders', 'totalMenus', 'totalPromos', 'salesData', 'categoryPreferences', 'loyaltyLevels'));
    }
}
