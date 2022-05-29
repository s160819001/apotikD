<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>Toko Obat</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body> -->
@extends('layout.conquer')
@section('content')
<h3 class="page-title">
			Daftar Obat | <small>Daftar obat yang tersedia di Apotik "D"</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Medicine</a>
						<i class="fa fa-angle-right"></i>
					</li>
				</ul>
				<div class="page-toolbar">
					<!-- tempat action button -->
				</div>
<div class="container">
  
  <table class="table table-striped">
    <thead>
      <tr>
        <div class="row">
        <th>Nama</th>
        <th>Bentuk</th>
        <th>Formula</th>
        <th>Kategori</th>
        <th>Foto</th>
        <th>Harga</th>
      </tr>
    </thead>
    <tbody>
      @foreach($result as $d)
        <tr>
            <td>{{$d->generic_name}}</td>
            <td>{{$d->form}}</td>
            <td>{{$d->restriction_formula}}</td>
            <td>{{$d->category->category_name}}</td>
            
            <td>
              <a href='#detail_{{$d->id}}' data-toggle='modal'>
                <img src="{{asset('images/'.$d->image)}}" height= 100px;>
              </a>
              <div class="modal fade" id="detail_{{$d->id}}" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">{{$d->generic_name}} {{$d->form}}</h4>
                      </div>
                      <div class="modal-body">
                        <img src="{{asset('images/'.$d->image)}}" height='400px' />
                        <br>Batas pemakaian : {{$d->restriction_formula}}
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                  </div>
                </div>
              </div>
            </td>
            <td>{{$d->price}}</td>
            <td>
              <a class='btn btn-info' href="{{route('medicines.show',$d->id)}}"
                  data-target="#show{{$d->id}}" data-toggle='modal'>detail</a>
                  <a class='btn btn-warning' href="{{route('medicines.show',$d->id)}}"
                  data-target="#show{{$d->id}}" data-toggle='modal'>edit</a>
                  <a class="btn btn-danger" href="{{route('medicines.show',$d->id)}}"
                  data-target="#show{{$d->id}}" data-toggle='modal'>hapus</a>        
              <div class="modal fade" id="show{{$d->id}}" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <!-- put animated gif here -->
                    <img src="{{asset('assets/img/ajax-modal-loading.gif')}}" alt="" class="loading">
                  </div>
                </div>
              </div>
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="container">
  <h2>Daftar Obat</h2>
    <div class="row">
      @foreach($result as $d)
      <div class="col-md-3" style="text-align:center; border:1px solid black; margin:10px; padding:10px; border-radius:5px;">
        <img src="{{asset('images/'.$d->image)}}" height="120px"/><br>
        <a href="/medicines/{{$d->id}}" target="_blank">
          <b>{{$d->generic_name}}</b><br>
          {{$d->form}}<br>
        </a>
         <b>Rp {{$d->price}},-</b>
      </div>
      @endforeach
  </div>
</div>
@endsection
<!-- 
</body>
</html> -->

