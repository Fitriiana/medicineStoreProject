<?php

namespace App\Http\Controllers;

use App\Category;
use App\Medicine;
use Illuminate\Http\Request;
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
        // 2. Tampilkan seluruh nama medecines, formula dan harga
        // $listmedicines = DB::table('medicines')->select('generic_name', 'restriction_formula', 'price')->get();

        // Eloquent
        $listmedicines = Medicine::get(['generic_name', 'restriction_formula', 'price']);
        // return view('medicine.list_medicine_oneform', compact('nama_obat_oneform'));

        // 1. Tampilkan seluruh nama medecines, formula dan nama kategori
        // DB QUERY
        // $list_fromobat_namakategori = DB::table('medicines')->join('categories', 'medicines.category_id', '=', 'categories.id')->select('medicines.generic_name', 'medicines.restriction_formula', 'categories.name')->get();

        // eloquent
        $list_fromobat_namakategori = Medicine::join('categories', 'medicines.category_id', '=', 'categories.id')
            ->select('medicines.generic_name', 'medicines.restriction_formula', 'categories.name')
            ->get();



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
        return view('medicine.show', compact('messages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        //
    }
}
