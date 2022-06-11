@extends('layouts.frontend')

@section('title', 'Products')

@section('content')

    <div class="container products">

        <div class="row">
            @foreach ($medicine as $data)
                
           
                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="thumbnail">
                        {{-- <img src="{{ asset('images/'.$data->id.'.jpg')}}" width="500" height="500"> --}}
                        <div class="caption">

                            <h4>{{$data->generic_name}}</h4>
                            <p>{{Str::limit(strtolower($data->description), 50)}}</p>
                            <p><strong>Price: </strong> Rp. {{$data->price}}</p>
                            <p class="btn-holder"><a href="{{url('add-to-cart/'.$data->id)}}" class="btn btn-warning btn-block text-center"  role="button">Add to cart</a> </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div><!-- End row -->

    </div>

@endsection