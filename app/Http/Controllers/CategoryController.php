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
        return view('category.listkategori', compact('kategori'));

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
        return view("category.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Category();

        $file = $request->file('logo');
        $imgFolder = 'images';
        $imgFile = time()."_".$file->getClientOriginalName();
        $file -> move($imgFolder, $imgFile);
        $data->logo=$imgFile;


        $data->name = $request->get('nameCategory');
        $data->description = $request->get('description');
        // untuk getnya itu bukan yang bersifat get/post methodnya itu hanya berfungsi untuk ambil aja
        $data->save();
        return redirect()->route('reportallcategory')->with('status', 'Category is added');
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
    public function edit($category)
    {
        $data = Category::find($category);
        return view('category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        $data = Category::find($category);
        $data->name = $request->get('nameCategory');
        $data->description = $request->get('description');
        $data->save();
        return redirect()->route('reportallcategory')->with('status', 'Category is changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        $data = Category::find($category);
        $this->authorize('delete-permission', $data);
        try {
            $data->delete();
            return redirect()->route('reportallcategory')->with('status', 'Category is success to Delete');
        } catch (\PDOException $e) {
            $msg = "Data Gagal Dihapus. Pastikan data child sudah hilang atau tidak berhubungan";

            return redirect()->route('reportallcategory')->with('error', $msg);
        }
    }
    public function showall()
    {
        // // 1. tampilkan seluruh data kategori obat
        // $kategori = DB::table('categories')->get();
        // eloquent 
        $kategori = Category::all();
        return view('category.listkategori', compact('kategori'));
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
    // week 11
    public function getEditForm(Request $request)
    {
        $id = $request->get('id');
        $data = Category::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('category.getEditForm', compact('data'))->render()
        ), 200);
    }

    public function getEditForm2(Request $request)
    {
        $id = $request->get('id');
        $data = Category::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('category.getEditForm2', compact('data'))->render()
        ), 200);
    }

    public function saveData(Request $request)
    {
        $id = $request->get('id');
        $category = Category::find($id);
        $category->name = $request->get('name');
        $category->description = $request->get('description');
        $category->save();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Category data updated'
        ), 200);
    }
    public function deleteData(Request $request)
    {
        try {
            $id = $request->get('id');
            $category = Category::find($id);
            $category->delete();
            return response()->json(array(
                'status' => 'oke',
                'msg' => 'Category data is deleted'
            ), 200);
        } catch (\PDOException $e) {
            return response()->json(array(
                'status' => 'gagal',
                'msg' => 'cant deleted Category data '
            ), 200);
        }
    }

    public function saveDataField(Request $request)
    {
        $id = $request->get('id');
        $fname = $request->get('fname');
        $value = $request->get('value');

        // dd($id);
        $category = Category::find($id);
        $category->$fname = $value;
        $category->save();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Category data updated'
        ), 200);
    }
}
