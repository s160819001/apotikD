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
        <!-- <th>Bentuk</th>
        <th>Formula</th>
        <th>Harga</th> -->
      </tr>
    </thead>
    <tbody>
        @foreach($result as $d)
        <tr>
            <td>{{$d->category_name}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

</body>
</html>

