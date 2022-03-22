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
<div class="portlet">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-reorder"></i>Daftar Kategori
		</div>
	</div>
	<div class="portlet-body">
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
            <a href="/medicines/{{$m->id}}" target="_blank">
            <b>{{$m->generic_name}}</b><br>
            {{$m->form}}<br>
            </a>
            <b>Rp {{$m->price}},-</b>
            </div>
          @endforeach
          <a class='btn btn-xs btn-info'   data-toggle='modal' data-target='#myModal'
          onclick='showProducts({{ $d->id }})'>
          Detail</a>
      </td>
      @endforeach
    </tbody>
  </table>
  <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-wide">
     <div class="modal-content">
       <div class="modal-header">
          <h4 class="modal-title">Detail Obat</h4>
       </div>
        <div class="modal-body" id="showproducts">
          <img src="{{asset('assets/img/heartbeat.gif')}}" alt="" style="display: block;
  margin-left: auto;
  margin-right: auto;
  width: 30%;" class="loading">
        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
        
     </div>
  </div>
</div>

	</div>
</div>
@endsection
<!-- </body>
</html> -->

@section('javascript')
<script>
function showProducts(category_id)
{
  $.ajax({
    type:'GET',
    url:'{{url("report/listmedicine/")}}'+"/"+category_id,
    data:{'_token':'<?php echo csrf_token() ?>',
          'category_id':category_id
         },
    success: function(data){
       $('#showproducts').html(data)
    }
  });
}
</script>
@endsection
