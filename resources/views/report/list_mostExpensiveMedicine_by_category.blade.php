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
<div class="container">
  <h2>Obat Termahal Berdasarkan Kategori</h2>
<hr>
  @foreach($result as $d)
  <table class="table table-striped">
    <h3>Kategori : {{$d->category_name}}</h3>
    <thead>
      <tr>
        <div class="row">
        <th>Nama</th>
        <th>Bentuk</th>
        <th>Foto</th>
        <th>Harga</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$d->generic_name}}</td>
            <td>{{$d->form}}</td>
            <td><img src="{{asset('images/'.$d->image)}}" height= 100px;></td>
            <td>{{$d->price}}</td>
        </tr>
    </tbody>
  </table>
  @endforeach
</div>
@endsection
<!-- </body>
</html> -->

