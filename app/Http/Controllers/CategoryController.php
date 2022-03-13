<?php

namespace App\Http\Controllers;

use App\Category;
use App\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // // 1. tampilkan seluruh data kategori obat
        // $kategori = DB::table('categories')->get();
        // eloquent 
        $kategori = Category::all();

        // // 2. Tampilkan nama kategori yang tidak memiliki data medicines satupun
        // $list_kategori_noobat = DB::table('categories')->select('name')->leftJoin('medicines', 'categories.id', '=', 'medicines.category_id')->whereNotIn('categories.id', function ($q) {
        //     $q->select('category_id')->from('medicines');
        // })->get();
        // eloquent
        $q = Medicine::get('category_id');
        $list_kategori_noobat = Category::leftjoin('medicines', 'categories.id', '=', 'medicines.category_id')
            ->select('categories.name', 'categories.id')
            ->whereNotIn('categories.id', $q)->get();
        // dd($list_kategori_noobat);
        // return view('category.list_havent_medicine', compact('list_kategori_noobat'));

        // Nomor 3
        $rerataharga = DB::table('categories')
            ->selectRaw('COALESCE(avg(medicines.price), 0) as average_price')
            ->leftJoin('medicines', 'categories.id', '=', 'medicines.category_id')
            ->groupBy('categories.id')
            ->get();

        // eloquent model
        // $rerataharga = Category::leftJoin('medicines', 'categories.id', '=', 'medicines.category_id')
        //     ->selectRaw('(CASE WHEN (NOT ISNULL(avg(medicines.price))) THEN avg(medicines.price) ELSE 0 END) as average_price')
        //     ->groupBy('categories.id')
        //     ->get();
        // dd($rerataharga);
        return view('category.list_avg_price', compact('rerataharga'));

        // nomor 4
        // $kategoriobat = DB::table('categories')
        //     ->join('medicines', 'categories.id', '=', 'medicines.category_id')
        //     ->select('categories.*')
        //     ->groupBy('category_id')
        //     ->orderBy(DB::raw('count(generic_name)'))
        //     ->first();
        $kategoriobat = Category::join('medicines', 'categories.id', '=', 'medicines.category_id')
            ->groupBy('category_id')->orderBy(DB::raw('count(generic_name)'))
            ->select('categories.*')
            ->first();
        // dd($kategoriobat);
        // return view('category.list_category_onemed', compact('kategoriobat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
    public function showlist($id_category)
    {
        $data  = Category::find($id_category);
        $namecategory = $data->name;
        $result = $data->medicines;

        if ($result)
            $gettotaldata = $result->count();
        else $gettotaldata = 0;
        // dd($data);


        return view('report.list_medicine_by_category', compact('id_category', 'namecategory', 'result', 'gettotaldata'));
    }
}
