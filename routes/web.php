<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
// Route::get('/', function () {
//     return view('layout/conquer');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Medicines
Route::middleware(['auth'])->group(function () {
    Route::resource('medicine', 'MedicineController');

    Route::get('medicines/medicinewithjquery', 'MedicineController@showall')->name('reportallmedicine');
    Route::get('medicines/listmedicine', 'MedicineController@showmedicines')->name('reportlistmedicines');
    Route::get('medicines/list_categoryname_medicine', 'MedicineController@shownamekategori')->name('reportlistkatmedicines');
    Route::post('medicines/showInfo', 'MedicineController@showInfo')->name('medicine.showInfo');

    Route::get('medicines/listallmedicine', 'MedicineController@showlistMedicines')->name('reportlistallmedicines');

    // Medicine Week 11
    Route::post('/obat/getEditForm', 'MedicineController@getEditForm')->name('medicine.getEditForm');
    Route::post('/obat/getEditForm2', 'MedicineController@getEditForm2')->name('medicine.getEditForm2');
    Route::post('/obat/saveData', 'MedicineController@saveData')->name('medicine.saveData');
    Route::post('/obat/deleteData', 'MedicineController@deleteData')->name('medicine.deleteData');
});

// Categories
Route::middleware(['auth'])->group(function () {
    Route::resource('kategori', 'CategoryController');

    Route::get('category/listallcategory', 'CategoryController@showall')->name('reportallcategory');

    // WEEK 11
    Route::post('/categories/getEditForm', 'CategoryController@getEditForm')->name('category.getEditForm');
    Route::post('/categories/getEditForm2', 'CategoryController@getEditForm2')->name('category.getEditForm2');
    Route::post('/categories/saveData', 'CategoryController@saveData')->name('category.saveData');
    Route::post('/categories/deleteData', 'CategoryController@deleteData')->name('category.deleteData');
    // week 14
    Route::post('/categories/saveDataField', 'CategoryController@saveDataField')->name('category.saveDataField');
});

// Transaction
Route::middleware(['auth'])->group(function () {
    // Route::resource('transaction', 'TransactionController');
    Route::get('report/listmedicine/{id}', 'CategoryController@showlist')->name('reportshowmedicine');

    Route::get('transactions/listalltransaction', 'TransactionController@index')->name('listtransactions');
    Route::post('transaction/showDataAjax', 'TransactionController@showAjax')->name('transaction.showAjax');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'MedicineController@front_index');
    Route::get('cart', 'MedicineController@cart');
    Route::get('add-to-cart/{id}', 'MedicineController@addToCart');
});

Route::get('checkout', 'TransactionController@from_submit_front')->middleware(['auth']);
Route::get('/submit_checkout', 'TransactionController@submit_front')->name('submitcheckout')->middleware(['auth']);
