@extends('layouts.conquer')

@section('content')
{{-- WEEK 8 --}}
<div class="container">
  <h2>Daftar Transaksi</h2>
  {{-- <div id='msg'></div>    --}}
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Pembeli</th>
        <th>Kasir</th>
        <th>Tanggal Transaction</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($list_transaction as $li)
            <tr>
              <td>{{$li->id}}</td>
                <td>{{ $li->buyer->name}}</td>
                <td>{{ $li->user->name}}</td>
                <td>{{ $li->created_at}}</td>

                <td>
                  <a href="#detail_{{$li->basic}}" class="btn btn-default" data-toggle="modal" onclick="getDetailData({{$li->id}});">Lihat Rincian Pembelian</a>
                </td>


                <div class="modal fade" id="detail_{{$li->basic}}" tabindex="-1" role="basic" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h3 style="font-weight: bold;">Detail Transactions</h3>
                     </div>

                      <div class="modal-body">
                        <div id='msg'></div>   
                      </div>
                         
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                      
                    </div>
                  </div>
                </div>

                
            </tr>
        @endforeach
       
    </tbody>
  </table>
</div>

@endsection

@section('javascript')
<script>
  function getDetailData(id)
  {
    $.ajax({
    type:'POST',
    url:'{{route("transaction.showAjax")}}',
    data: '_token= <?php echo csrf_token() ?>&id=' + id,
    success: function(data){
       $('#msg').html(data.msg)
    }
  });

  }
</script>
@endsection
