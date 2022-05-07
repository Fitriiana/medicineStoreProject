@extends('layout.conquer')

@section('content')
	{{--tambahan week 7  --}}
  <div class="modal fade" id="disclaimer" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">DISCLAIMER</h4>
          </div>
          <div class="modal-body">
            Pictures shown are for illustration purpose only.Actual product may vary due to product enhancement.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    </div>
  </div>
  <a class="btn btn-default" data-toggle="modal" href="#disclaimer">Disclaimer</a>
{{-- end week 7 --}}
			
  <!-- BEGIN PAGE HEADER-->
  <h3 class="page-title">
  Dashboard <small>statistics and more</small>
  </h3>
  <div class="page-bar">
    <ul class="page-breadcrumb">
      <li>
        <i class="fa fa-home"></i>
        <a href="index.html">Home</a>
        <i class="fa fa-angle-right"></i>
      </li>
      <li>
        <a href="#">Welcome</a>
     </li>
      <li >
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <a href="#" onclick="showInfo()">
           <i class="icon-bulb"></a></i>
        </li>
   
    </ul>
    

    {{-- <div class="page-toolbar">
      <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height btn-primary" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
        <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
      </div>
    </div> --}}
  </div>
  <!-- END PAGE HEADER-->
<div class="container">
 
  <div id='showinfo'></div>
  <h2>List Medicines</h2>
  <p>Table List Medicines:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Generic Name</th>
        <th>Form</th>
        <th>Restriction Formula</th>
        <th>Description</th>
        <th>Category ID</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($obat as $li)
            <tr>
              
              <td>
                <a class="btn btn-default" data-toggle="modal" href="#detail_{{$li->id}}" 
                  data-toggle="modal">{{ $li->id}}</a>  
                
                <div class="modal fade" id="detail_{{$li->id}}" tabindex="-1" role="basic" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h4 class="modal-title">{{$li->generic_name}}</h4>
                        </div>
                        <div class="modal-body">
                          <img src="{{ asset('images/'.$li->id.'.jpg') }}" height='200px' />
                        </div>
                        <div class="modal-header">
                          <h3 style="font-weight: bold;">Description</h3>
                          <h4 class="modal-title">{{$li->description}}</h4>
                       </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </div>
                </div>
              </td>
              <td>{{ $li->generic_name}}</td>
              <td>{{ $li->form}}</td>
              <td>{{ $li->restriction_formula}}</td>
              <td>{{ $li->description}}</td>
              <td>{{ $li->category_id}}</td>
              <td>{{ $li->price}}</td>
              {{-- <td>
                <a class='btn btn-info' href="{{route('medicine.show_medicines',$li->id)}}"
                   data-target="#show{{$li->id}}" data-toggle='modal'>detail</a>        
                <div class="modal fade" id="show{{$li->id}}" tabindex="-1" role="basic" aria-hidden="true">
                  <div class="modal-dialog">
                   <div class="modal-content">
                     <!-- put animated gif here -->
                   </div>
                  </div>
                </div>
              </td> --}}
            </tr>
        @endforeach
    </tbody>
  </table>
  
</div>


@endsection

@section('javascript')
<script>
  function showInfo()
  {
    $.ajax({
    type:'POST',
    url:'{{route("medicine.showInfo")}}',
    data:'_token=<?php echo csrf_token() ?>',
    success: function(data){
       $('#showinfo').html(data.msg)
    }
  });

  }
</script>
@endsection


