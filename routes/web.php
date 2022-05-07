<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// nama harus berbeda biar ndak tabrakan 
Route::get('/', function () {
    return view('layout/conquer');
});
Route::resource('medicine', 'MedicineController');
Route::resource('kategori', 'CategoryController');
// Route::resource('transaction', 'TransactionController');
Route::get('report/listmedicine/{id}', 'CategoryController@showlist')->name('reportshowmedicine');

Route::get('category/listallcategory', 'CategoryController@showall')->name('reportallcategory');
Route::get('medicines/medicinewithjquery', 'MedicineController@showall')->name('reportallmedicine');
Route::get('medicines/listmedicine', 'MedicineController@showmedicines')->name('reportlistmedicines');
Route::get('medicines/list_categoryname_medicine', 'MedicineController@shownamekategori')->name('reportlistkatmedicines');
Route::post('medicines/showInfo', 'MedicineController@showInfo')->name('medicine.showInfo');

Route::get('transactions/listalltransaction', 'TransactionController@index')->name('listtransactions');
Route::post('transaction/showDataAjax', 'TransactionController@showAjax')->name('transaction.showAjax');


Route::get('medicines/listallmedicine', 'MedicineController@showlistMedicines')->name('reportlistallmedicines');
