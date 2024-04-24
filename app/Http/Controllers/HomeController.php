<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\FullCustom;
use App\Models\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $products = Product::latest()->paginate(3);
        $categories = Category::latest()->paginate(3);
        return view('home', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function about()
    {
        return view('about');
    }

    public function products(Request $request)
    {
        $products = Product::orderBy('name', 'asc')->latest()->filter(request(['search', 'category']))->paginate(12)->withQueryString();
        $products->appends($request->all()); //agar searching ikut di paginasi
        $categories = Category::all();
        return view('catalog', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function show(Product $product)
    {
        return view('detail', [
            'product' => $product,
        ]);
    }

    public function categories()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('categories', [
            'categories' => $categories,
        ]);
    }

    public function show_category(Category $category)
    {
        $products = Product::where('category_id', $category->slug)->latest()->paginate(12);
        return view('category', compact('products', 'category'));
    }

    public function navbarNotif(FullCustom $fullCustom, Message $message)
    {
        $notifs = Message::where('full_custom_id', $fullCustom->id);
        return view('layouts.navbar', compact('fullCustom', 'notifs'));
    }
}
