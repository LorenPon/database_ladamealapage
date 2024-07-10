<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Color;
use App\Models\Item;
use App\Models\Size;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    private function validateData(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'price' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'collections' => 'required|array',
            'collections.*' => 'exists:collections,id',
            'colors' => 'required|array',
            'colors.*' => 'exists:colors,id',
            'sizes' => 'required|array',
            'sizes.*' => 'exists:sizes,id',
        ]);
    }

    public function index()
    {
        $categories = Category::all();
        $collections = Collection::all();
        $colors = Color::all();
        $sizes = Size::all();
        $items = Item::orderby('id', 'asc')->paginate(4);
        return view('admin.items.index', compact('items', 'categories', 'collections', 'colors', 'sizes'));
    }

    public function index_admin()
    {
        $categories = Category::all();
        $collections = Collection::all();
        $colors = Color::all();
        $sizes = Size::all();
        $items = Item::orderby('id', 'asc')->paginate(4);
        return view('admin.items.index', compact('items', 'categories', 'collections', 'colors', 'sizes'));
    }

    public function create()
    {
        $categories = Category::all();
        $collections = Collection::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.items.create', compact('categories', 'collections', 'colors', 'sizes'));
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateData($request);

        $item = new Item();
        $item->name = $validatedData['name'];
        $item->description = $validatedData['description'];
        $item->category_id = $validatedData['category_id'];
        $item->price = $validatedData['price'];

        if ($request->hasFile('img')) {
            $fileName = time() . '_' . $request->file('img')->getClientOriginalName();
            $request->file('img')->storeAs('img', $fileName, 'public');
            $item->img = $fileName;
        }

        $item->save();

        $item->collections()->attach($validatedData['collections']);
        $item->colors()->attach($validatedData['colors']);
        $item->sizes()->attach($validatedData['sizes']);

        return redirect()->route('admin.items.index');
    }

    public function edit(string $id)
    {
        $item = Item::findOrFail($id);
        $collections = Collection::all();
        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.items.edit', compact('item', 'categories', 'collections', 'colors', 'sizes'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $this->validateData($request);
        $item = Item::findOrFail($id);

        $item->name = $validatedData['name'];
        $item->description = $validatedData['description'];
        $item->category_id = $validatedData['category_id'];
        $item->price = $validatedData['price'];

        if ($request->hasFile('img')) {
            $fileName = time() . '_' . $request->file('img')->getClientOriginalName();
            $imgPath = $request->file('img')->storeAs('img', $fileName, 'public');
            $item->img = $imgPath;
        }

        $item->save();

        $item->collections()->sync($validatedData['collections']);
        $item->colors()->sync($validatedData['colors']);
        $item->sizes()->sync($validatedData['sizes']);

        return redirect()->route('admin.items.index');
    }

    public function destroy(string $id)
    {
        $item = Item::findOrFail($id);
        $item->collections()->detach();
        $item->colors()->detach();
        $item->sizes()->detach();
        $item->delete();

        return redirect()->route('admin.items.index');
    }
}
