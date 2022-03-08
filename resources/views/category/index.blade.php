<!DOCTYPE html>
<html lang="en">
<head>
  <title>Toko Obat</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Daftar Kategori</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nama</th>
      </tr>
    </thead>
    <tbody>
      @foreach($result as $d)
      <tr>
        <td>{{$d->category_name}}</td>
      </tr>
      <td>
          @foreach($d->medicines as $m)
            <div class="col-md-3" style="text-align:center; border:1px solid black; margin:10px; padding:10px; border-radius:5px;">
            <img src="{{asset('images/'.$m->image)}}" height="120px"/><br>
            <b>{{$m->generic_name}}</b><br>
            {{$m->form}}<br>
            <b>Rp {{$m->price}},-</b>
            </div>
          @endforeach
      </td>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>

