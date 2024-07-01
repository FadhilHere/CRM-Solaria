<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index()
    {
        $orderDetails = OrderDetail::with(['order', 'menu'])->get();
        return view('admin.order_details.index', compact('orderDetails'));
    }

    public function show($id)
    {
        $orderDetail = OrderDetail::with(['order', 'menu'])->findOrFail($id);
        return view('admin.order_details.show', compact('orderDetail'));
    }
}
