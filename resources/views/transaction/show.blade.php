@extends('layouts.frontend')

@section('content')
<div class="portlet">
  <div class="portlet-title">
    <b>Pemesanan dari Transaksi Kode: {{$transaction->id}}</b>
    <b>Tanggal Pemesanan: {{$transaction->transaction_date}}</b>
  </div>

  <div class="portlet-body">
    <div class="row">
      <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
            <?php $ts = $trasaction->medicine; ?>
            
              @foreach ($ts as $dp)
                <tr>
                    <td data-th="Product">
                      <div class="row">
                          {{-- <div class="col-sm-3 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div> --}}
                          <div class="col-sm-9">
                              <h4 class="nomargin"> {{$dp->generic_name}}</h4>
                              <p></p>
                          </div>
                      </div>
                  </td>
                  <td data-th="Price">Rp. {{$dp->price}}</td>
                  <td data-th="Quantity">
                      {{-- <input type="number" class="form-control text-center" value="1"> --}}
                      {{$dp->pivot->quantity}}
                  </td>
                  <td data-th="Subtotal" class="text-center">Rp. {{$d->pivot->price}}</td>
                  <td class="actions" data-th="">
                      <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                      <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                  </td>
                </tr>
              @endforeach
       
        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Total {{$transaction->total}}</strong></td>
        </tr>
        <tr>
            <td><a href="{{ url('/home') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>Kembali Ke Daftar Pemesanan</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total Rp. {{$transaction->total}}</strong></td>
        </tr>
        </tfoot>
    </table>
    </div>
  </div>

</div>
   

@endsection