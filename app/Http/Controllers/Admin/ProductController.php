<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display all products
     */
    public function index()
    {
        $products = Product::orderBy('order')->get();
        return view('adminpanel.products.index', compact('products'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('adminpanel.products.create');
    }

    /**
     * Store new product
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'icon'         => 'nullable',
            'icon_image'   => 'nullable|image|max:2048',
            'theme_color'  => 'required|string',
            'button_text'  => 'nullable|string|max:255',
            'button_link'  => 'nullable',
            'order'        => 'nullable|integer',
        ]);

        // Handle icon image upload
        if ($request->hasFile('icon_image')) {
            $data['icon'] = $request->file('icon_image')
                ->store('products', 'public');
        }

        $data['product_section_id'] = 1; // single section
        $data['is_active'] = $request->has('is_active');
        $data['order'] = $data['order'] ?? 0;

        Product::create($data);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product added successfully');
    }

    /**
     * Show edit form
     */
    public function edit(Product $product)
    {
        return view('adminpanel.products.edit', compact('product'));
    }

    /**
     * Update product
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'icon'         => 'nullable',
            'icon_image'   => 'nullable|image|max:2048',
            'theme_color'  => 'required|string',
            'button_text'  => 'nullable|string|max:255',
            'button_link'  => 'nullable',
            'order'        => 'nullable|integer',
        ]);

        // Replace icon image if uploaded
        if ($request->hasFile('icon_image')) {

            // delete old image if exists
            if ($product->icon && str_contains($product->icon, '/')) {
                Storage::disk('public')->delete($product->icon);
            }

            $data['icon'] = $request->file('icon_image')
                ->store('products', 'public');
        }

        $data['is_active'] = $request->has('is_active');
        $data['order'] = $data['order'] ?? $product->order;

        $product->update($data);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Delete product
     */
    public function destroy(Product $product)
    {
        // delete icon image if exists
        if ($product->icon && str_contains($product->icon, '/')) {
            Storage::disk('public')->delete($product->icon);
        }

        $product->delete();

        return back()->with('success', 'Product deleted successfully');
    }
}
