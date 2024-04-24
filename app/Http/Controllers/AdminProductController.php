<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::latest()->when(request()->search, function ($products) {
            $products = $products->where('name', 'like', '%' . request()->search . '%');
        })->paginate(5);
        $products->appends($request->all()); //agar searching ikut di paginasi
        $title = 'Hapus Produk!';
        $text = "Apakah anda yakin akan menghapus ?";
        confirmDelete($title, $text);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'product_image'   => 'required|image|file|max:1024',
            'name'            => 'required|min:3',
            'slug'            => 'required|unique:products',
            'category_id'     => 'required',
            'description'     => 'required',
            'price_meter'     => 'required',
        ]);

        if ($request->file('product_image')) {
            $validateData['product_image'] = $request->file('product_image')->store('gambar-produk'); //penyimpanan gambar
        }

        Product::create($validateData);

        Alert::success('Sukses', 'Data Berhasil Ditambahkan');
        return redirect('/admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'product_image'   => 'image|file|max:1024',
            'name'            => 'required|min:3',
            'category_id'     => 'required',
            'description'     => 'required',
            'price_meter'     => 'required',
        ];

        if ($request->slug != $product->slug) {
            $rules['slug'] = 'required|unique:products';
        }

        $validateData = $request->validate($rules);

        if ($request->file('product_image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['product_image'] = $request->file('product_image')->store('gambar-produk'); //penyimpanan gambar
        }

        Product::where('id', $product->id)
            ->update($validateData);

        Alert::success('Sukses', 'Data Berhasil Diperbarui');
        return redirect('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->product_image) {
            Storage::delete($product->product_image);
        }
        Product::destroy($product->id);
        Alert::success('Sukses', 'Kategori Berhasil Dihapus');
        return redirect('/admin/product');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Product::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
