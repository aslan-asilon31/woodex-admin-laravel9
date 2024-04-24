<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::latest()->when(request()->search, function ($categories) {
            $categories = $categories->where('name', 'like', '%' . request()->search . '%');
        })->paginate(5);
        $categories->appends($request->all()); //agar searching ikut di paginasi
        $title = 'Hapus Kategori!';
        $text = "Apakah anda yakin akan menghapus ?";
        confirmDelete($title, $text);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name'            => 'required|min:3',
            'slug'            => 'required|unique:categories',
            'category_image'  => 'image|file|max:1024'
        ]);

        if ($request->file('category_image')) {
            $validateData['category_image'] = $request->file('category_image')->store('gambar-kategori'); //penyimpanan gambar
        }

        Category::create($validateData);
        Alert::success('Sukses', 'Data Berhasil Ditambahkan');
        return redirect('/admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name'            => 'required|min:3',
            'category_image'  => 'image|file|max:1024'
        ];

        if ($request->slug != $category->slug) {
            $rules['slug'] = 'required|unique:categories';
        }

        $validateData = $request->validate($rules);

        if ($request->file('category_image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['category_image'] = $request->file('category_image')->store('gambar-kategori'); //penyimpanan gambar
        }

        Category::where('id', $category->id)
            ->update($validateData);

        Alert::success('Sukses', 'Data Berhasil Diperbarui');
        return redirect('/admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->category_image) {
            Storage::delete($category->category_image);
        }

        Category::destroy($category->id);

        Alert::success('Sukses', 'Kategori Berhasil Dihapus');
        return redirect('/admin/category');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
