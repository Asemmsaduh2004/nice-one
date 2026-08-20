<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // الصفحة الرئيسية
    public function index()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }

    // صفحة الأدمن
    public function admin(Request $request)
    {
        $products = Product::all();
        return view('admin', compact('products'));
    }

    // حفظ منتج جديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imagePath
        ]);

        return redirect()->back()->with('success', 'تم إضافة المنتج بنجاح');
    }

    // حذف منتج
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('success', 'تم حذف المنتج بنجاح');
    }

    // 1. عرض صفحة السلة
    public function cart()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    // 2. إضافة منتج للسلة
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'تمت إضافة المنتج للسلة بنجاح!');
    }

    // 3. حذف منتج من السلة
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'تم إزالة المنتج من السلة');
    }
}