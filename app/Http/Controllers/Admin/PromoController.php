<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PromoController extends Controller
{
    public function index()
    {
        $promos = Promo::all();
        return view('admin.promos.index', compact('promos'));
    }

    public function create()
    {
        return view('admin.promos.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:promos,name',
            'expired' => 'required|date',
            'percentage' => 'required|integer|min:1|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        Promo::create([
            'name' => $request->name,
            'expired' => $request->expired,
            'percentage' => $request->percentage,
        ]);

        return response()->json(['success' => true, 'message' => 'Promo berhasil ditambahkan.']);
    }

    public function edit($id)
    {
        $promo = Promo::findOrFail($id);
        return view('admin.promos.edit', compact('promo'));
    }

    public function update(Request $request, $id)
    {
        $promo = Promo::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:promos,name,' . $id,
            'expired' => 'required|date',
            'percentage' => 'required|integer|min:1|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $promo->update([
            'name' => $request->name,
            'expired' => $request->expired,
            'percentage' => $request->percentage,
        ]);

        return response()->json(['success' => true, 'message' => 'Promo berhasil diperbarui.']);
    }

    public function destroy($id)
    {
        $promo = Promo::findOrFail($id);
        $promo->delete();

        return response()->json(['success' => true, 'message' => 'Promo berhasil dihapus.']);
    }
}
