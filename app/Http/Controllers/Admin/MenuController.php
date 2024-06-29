<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menu', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|unique:menus,name',
            'price' => 'required|numeric',
            'category' => 'required|in:Chinese,Western,Local',
        ]);

        $picturePath = $request->file('picture')->store('menus', 'public');

        Menu::create([
            'picture' => $picturePath,
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
        ]);

        return response()->json(['success' => true]);
    }


    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return response()->json($menu);
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $request->validate([
            'picture' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|unique:menus,name,' . $id,
            'price' => 'required|numeric',
            'category' => 'required|in:Chinese,Western,Local',
        ]);

        if ($request->hasFile('picture')) {
            // Delete the old picture
            if (Storage::disk('public')->exists($menu->picture)) {
                Storage::disk('public')->delete($menu->picture);
            }

            $picturePath = $request->file('picture')->store('menus', 'public');
            $menu->picture = $picturePath;
        }

        $menu->update([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
        ]);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        // Delete the picture
        if (Storage::disk('public')->exists($menu->picture)) {
            Storage::disk('public')->delete($menu->picture);
        }

        $menu->delete();

        return response()->json(['success' => true]);
    }
}
