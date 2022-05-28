<?php

namespace App\Http\Controllers;

use App\Category;
use App\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // nomor 1. Tampilan jumlah kategori yang memiliki data medicines 
        // $jumlahkategori = DB::table('medicines')->distinct()->count('category_id');
        // eloquent
        $jumlahKategori = Medicine::distinct('category_id')->count();
        // $total = $jumlahKategori->count();
        // dd($jumlahKategori);



        // nomor 5
        // $nama_obat_oneform = DB::table('medicines')
        //     ->groupBy('category_id')
        //     ->orderBy(DB::raw('count(generic_name)'))
        //     ->first();
        $nama_obat_oneform = Medicine::groupBy('category_id')->orderBy(DB::raw('count(generic_name)'))->first();
        // dd($nama_obat_oneform);
        // return view('medicine.list_medicine_oneform', compact('nama_obat_oneform'));


        // nomor 6
        // $kategorimaxprice = DB::select(DB::raw('select m.generic_name, categories.name
        // FROM medicines m INNER JOIN categories ON m.category_id = categories.id
        // WHERE m.price = (SELECT MAX(medicines.price) FROM medicines)'));
        // $maxprrice = DB::table('medicines')->max('price');
        // $medicine_maxprice = DB::table('medicines')
        //     ->select('medicines.generic_name', 'categories.name')
        //     ->join('categories', 'medicines.category_id', '=', 'categories.id')
        //     ->where('medicines.price', '=', function ($maxPrice) {
        //         $maxPrice->from('medicines')->select(DB::raw('MAX(price)'));
        //     })->get();

        // Eloquent
        $medicine_maxprice = Medicine::join('categories', 'medicines.category_id', '=', 'categories.id')
            ->select('medicines.generic_name', 'categories.name')
            ->orderBy('medicines.price', 'desc')
            ->first();

        // Cara 2
        // SELECT m.generic_name, categories.name FROM medicines m INNER JOIN categories ON m.category_id = categories.id ORDER BY m.price DESC LIMIT 1;


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataCategory = Category::all();
        return view('medicine.create', compact('dataCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Medicine();
        $data->generic_name = $request->get('genericName');
        $data->form = $request->get('formula');
        $data->restriction_formula = $request->get('restrictionForm');
        $data->price = $request->get('price');
        $data->description = $request->get('description');

        $data->category_id = $request->get('categoryID');

        $data->faskes1 = $request->get('faskes1');
        $data->faskes2 = $request->get('faskes2');
        $data->faskes3 = $request->get('faskes3');

        $data->save();
        return redirect()->route('reportlistallmedicines')->with('status', 'Medicine is added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */

    public function show($medicine)
    {
        //select * form medicine where id = 1
        $result = Medicine::find($medicine);
        $messages = "";
        if ($result) {
            // jika hasilnya ditemukan
            $messages = $result;
        } else {
            // jika hasilnya tidak ditemukan
            $messages = null;
        }

        // dd($result);
        // parsing
        // return view('medicine.show', compact('messages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit($medicine)
    {
        $data = Medicine::find($medicine);
        $dataCategory = Category::all();
        return view('medicine.editMedicine', compact('data', 'dataCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $medicine)
    {
        $data = Medicine::find($medicine);
        $data->generic_name = $request->get('genericName');
        $data->form = $request->get('formula');
        $data->restriction_formula = $request->get('restrictionForm');
        $data->price = $request->get('price');
        $data->description = $request->get('description');

        $data->category_id = $request->get('categoryID');

        $data->faskes1 = $request->get('faskes1');
        $data->faskes2 = $request->get('faskes2');
        $data->faskes3 = $request->get('faskes3');

        $data->save();
        return redirect()->route('reportlistallmedicines')->with('status', 'Medicine is changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy($medicine)
    {
        $data = Medicine::find($medicine);
        try {
            $data->delete();
            return redirect()->route('reportlistallmedicines')->with('status', ',Medicines is success to Delete');
        } catch (\PDOException $e) {
            $msg = "Data Gagal Dihapus. Pastikan data child sudah hilang atau tidak berhubungan";

            return redirect()->route('reportallcategory')->with('error', $msg);
        }
    }
    public function showall()
    {
        $obat = Medicine::all();
        return view('medicine.show_jquery', compact('obat'));
    }
    public function showmedicines()
    {
        // 2. Tampilkan seluruh nama medecines, formula dan harga
        // $listmedicines = DB::table('medicines')->select('generic_name', 'restriction_formula', 'price')->get();

        // Eloquent
        $listmedicines = Medicine::get(['generic_name', 'form', 'price']);
        return view('medicine.show_medicines', compact('listmedicines'));
    }
    public function showlistMedicines()
    {
        $obat = Medicine::all();
        $dataKategori = Category::all();
        return view('medicine.index', compact('obat', 'dataKategori'));
    }
    public function shownamekategori()
    {
        // 1. Tampilkan seluruh nama medecines, formula dan nama kategori
        // DB QUERY
        // $list_fromobat_namakategori = DB::table('medicines')->join('categories', 'medicines.category_id', '=', 'categories.id')->select('medicines.generic_name', 'medicines.restriction_formula', 'categories.name')->get();

        // eloquent
        $list_fromobat_namakategori = Medicine::join('categories', 'medicines.category_id', '=', 'categories.id')
            ->select('medicines.generic_name', 'medicines.restriction_formula', 'categories.name')
            ->get();
        return view('medicine.show_kategori_medicines', compact('list_fromobat_namakategori'));
    }
    public function showInfo()
    {
        $result = Medicine::orderBy('price', 'DESC')->first();
        return response()->json(array(
            'status' => 'oke',
            'msg' => "<div class='alert alert-info'>
             Did you know? The most expensive medicines is " . $result->generic_name . "</div>"
        ), 200);
    }


    public function getEditForm(Request $request)
    {
        $id = $request->get('id');
        $data = Medicine::find($id);
        $dataCategory = Category::all();
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('medicine.getEditForm', compact('data', 'dataCategory'))->render()
        ), 200);
    }

    public function getEditForm2(Request $request)
    {
        $id = $request->get('id');
        $data = Medicine::find($id);
        $dataCategory = Category::all();
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('medicine.getEditForm2', compact('data', 'dataCategory'))->render()
        ), 200);
    }

    public function saveData(Request $request)
    {
        $id = $request->get('id');
        $data = Medicine::find($id);

        $data->generic_name = $request->get('genericName');
        $data->form = $request->get('formula');
        $data->restriction_formula = $request->get('restrictionForm');
        $data->price = $request->get('price');
        $data->description = $request->get('description');

        $data->category_id = $request->get('categoryID');

        $data->faskes1 = $request->get('faskes1');
        $data->faskes2 = $request->get('faskes2');
        $data->faskes3 = $request->get('faskes3');

        $data->save();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Category data updated'
        ), 200);
    }
    public function deleteData(Request $request)
    {
        try {
            $id = $request->get('id');
            $data = Medicine::find($id);
            $data->delete();
            return response()->json(array(
                'status' => 'oke',
                'msg' => 'Medicine data is deleted'
            ), 200);
        } catch (\PDOException $e) {
            return response()->json(array(
                'status' => 'gagal',
                'msg' => 'Medicine deleted Category data '
            ), 200);
        }
    }
}
