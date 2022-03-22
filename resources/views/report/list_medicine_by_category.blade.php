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
  <h2>List Medicines by Category</h2>
  <p>Category ID : {{$id_category}} with name : {{$namecategory}} </p>
  <hr>
  <p>Total rows : {{$getTotalData}}</p>
  <table class="table table-striped">
    <thead>
      <tr>
        <div class="row">
        <th>Nama</th>
        <th>Bentuk</th>
        <th>Formula</th>
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
            <td><img src="{{asset('images/'.$d->image)}}" height= 100px;></td>
            <td>{{$d->price}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
<!-- </body>
</html> -->

