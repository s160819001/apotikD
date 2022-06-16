@extends('layouts.frontend')

@section('title', 'Products')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
 @endif

    <div class="container products">

   
        <div class="row">
            @foreach($medicine as $m)
            <div class="col-xs-18 col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img  height= 200px src="{{asset('images/'.$m->image)}}" alt="">
                    <div class="caption">
                        <h4>{{$m->generic_name}}</h4>
                        <h5>({{$m->form}})</h5>
                        <p>Dose Limit: {{$m->restriction_formula}}</p>
                        <p> Catatan : {{$m->description}}</p>
                        <p><strong>Price: </strong> Rp {{number_format($m->price,0,',','.')}},-</p>
                        <p class="btn-holder"><a href="{{url('add-to-cart/'.$m->id)}}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                    </div>
                </div>
            </div>
            
        @endforeach


        </div>
        <!-- End row -->

    </div>

@endsection