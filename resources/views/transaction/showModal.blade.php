{{-- @dd($data) --}}
<div class="portlet">
  <div class="portlet-title">
    <b>Tampilan Transaksi dari: {{$data->id}} - {{$data->transaction_date}}</b>
  </div>

  <div class="portlet-body">
    <div class="row">
      @foreach ($dataProduk as $li)
          <div class="col-md-4">
            <div class="thumbnail">
              <img src="{{ asset('images/'.$li->id.'.jpg') }}" alt="">
              <div class="caption">
                <p style="align-items: center"><b>{{$li->generic_name}}</b></p>
                <hr>
                <p>Kategori: {{$li->category->name}}</p>
                <p>Harga: Rp. {{$li->price}}</p>
               <p>Jumlah Beli: {{$li->pivot->quantity}}</p>
              </div>
            </div>
          </div>
      @endforeach
    </div>
  </div>
</div> 
{{-- @endsection --}}