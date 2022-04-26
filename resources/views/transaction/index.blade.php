
@extends('layout.conquer')
@section('content')
<h3 class="page-title">
			Daftar Transaksi | <small>Daftar transaksi di Apotik "D"</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Transaction</a>
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
        <th>ID</th>
        <th>Pembeli</th>
        <th>Kasir</th>
        <th>Tanggal</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($result as $d)
        <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->buyer->name}}</td>
            <td>{{$d->user->name}}</td>
            <td>{{$d->transaction_date}}</td>
            <td>
              <a class='btn btn-info' href="#basic"
                  data-toggle='modal' onclick="getDetailData2({{$d->id}});">detail</a>        
            
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>
            
</div>
<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
                 <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Detail Transaksi</h4>
                      </div>
                      <div class="modal-body" id='msg'>
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                  </div>
                </div>
            </div>

@endsection

@section('javascript')
<script>
    function getDetailData(id) {
        $.ajax({
        type:'POST',
        url:'{{route("transactions.showAjax")}}',
        data:'_token=<?php echo csrf_token()?> &id='+id,
        success:function(data) {
        $("#msg").html(data.msg);
        }
    });}

    function getDetailData2(id) {
        $.ajax({
        type:'GET',
        url:'{{url("transactions/showDataAjax2")}}/'+id,
        success:function(data) {
        $("#msg").html(data.msg);
        }
    });}

</script>
@endsection

