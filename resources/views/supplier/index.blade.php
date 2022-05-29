
@extends('layout.conquer')
@section('content')
<h3 class="page-title">
			Daftar Supplier | <small>Daftar Supplier Apotik "D"</small>
			</h3>

			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Supplier</a>
						<i class="fa fa-angle-right"></i>
					</li>
				</ul>
				<div class="page-toolbar">
					<!-- tempat action button -->
          <a href="{{url('suppliers/create')}}" class="btn btn-info">+Tambah Supplier</a>  
          <a href="#modalCreate" data-toggle='modal' class="btn btn-info">+Tambah Supplier(modal)</a>
                    
				</div>
</div>

@if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
 @endif
<div class="container">
  <table class="table table-striped">

    <thead>
      <tr>
        <div class="row">
        <th>ID</th>
        <th>Nama</th>
        <th>Alamat</th>
        <!-- <th>
            <a href="{{url('suppliers/create')}}" class="btn btn-info">+Tambah Supplier</a>    
        </th> -->
        <!-- <th>
            <a href="#modalCreate" data-toggle='modal' class="btn btn-info">+Tambah Supplier(modal)</a>    
        </th> -->
        <th>Aksi Edit</th>
        <th>Aksi Hapus</th>
      </tr>
    </thead>
    <tbody>
      @foreach($result as $d)
        <tr id="tr_{{$d->id}}">
            <td id="td_{{$d->id}}">{{$d->id}}</td>
            <td id="td_name_{{$d->id}}">{{$d->name}}</td>
            <td id="td_address_{{$d->id}}">{{$d->address}}</td>
            <th>
                <a href="{{url('suppliers/' . $d->id . '/edit')}}" class="btn btn-warning">Edit</a> 
                <a href="#modalEdit" 
                  data-toggle='modal' 
                  class="btn btn-warning" 
                  onclick='getEditForm({{$d->id}})'>Edit(modal)</a>
                  <a href="#modalEdit" 
                  data-toggle='modal' 
                  class="btn btn-warning" 
                  onclick='getEditForm2({{$d->id}})'>Edit(TD)</a>
                
            </th>
            <th>
              <div style="float:left;">

              @can('delete-permission')
            <form method="POST" action="{{url('suppliers/'.$d->id)}}">
                @csrf
                @method('DELETE')
                  <input type="submit" value="Hapus" class="btn btn-danger" onclick="if(!confirm('Apa anda yakin menghapus data supplier &quot;{{$d->name}}&quot ?'))return false;">
                </form>  
                @endcan
</div> &nbsp
                <a class="btn btn-danger"
          onclick="if(confirm('Apa anda yakin menghapus data supplier &quot;{{$d->name}}&quot ?'))
                  deleteDataRemoveTR({{$d->id}})" 
          >Hapus2</a>
              <th>
        </tr>
      @endforeach
    </tbody>
  </table>
    <!-- <div style="float:right;">
        <a href="{{url('suppliers/create')}}" class='btn btn-info'
        type="button">+ Supplier baru</a>
    </div> -->
</div>



<div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content" >
              <form role="form" method="POST" action="{{url('suppliers')}}">
                @csrf
                <div class="modal-header">
                  <button type="button" class="close" 
                    data-dismiss="modal" aria-hidden="true"></button>
                  <h4 class="modal-title">Add New Supplier</h4>
                </div>
                <div class="modal-body">
                
                <div class="form-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control"  name="name" placeholder="Isikan nama supplier">
                        <span class="help-block">
                        *Tulis nama perusahaan supplier </span>
                    </div>
                    
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control" rows="3"></textarea>
                    </div>
                    
                </div>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" >Cancel</button>
                </div>
</form>
              </div>
            </div>
          </div>

<div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content" id='modalContent'>
      <div class="modal-header">
                  <button type="button" class="close" 
                    data-dismiss="modal" aria-hidden="true"></button>
                  <h4 class="modal-title">Edit Supplier</h4>
        </div>
                <div class="modal-body">
                  <img src="{{asset('images/payloader.gif')}}" style="width:100%;"/>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" >Cancel</button>
                </div>
      </div>
  </div>
</div>
@endsection


@section('javascript')
<script>
    function getEditForm(id) {
        $.ajax({
        type:'POST',
        url:'{{route("suppliers.getEditForm")}}',
        data:{'_token':'<?php echo csrf_token()?>', 'id':id},
        success:function(data) {
        $("#modalContent").html(data.msg);
        }
    });}

    function getEditForm2(id) {
        $.ajax({
        type:'POST',
        url:'{{route("suppliers.getEditForm2")}}',
        data:{'_token':'<?php echo csrf_token()?>', 'id':id},
        success:function(data) {
        $("#modalContent").html(data.msg);
        }
    });}

function deleteDataRemoveTR(id){
  $.ajax({
        type:'POST',
        url:'{{route("suppliers.deleteData")}}',
        data:{'_token':'<?php echo csrf_token()?>', 'id':id},
        success:function(data) {
          if(data.status=='OK'){
            alert(data.msg);
          $("#tr_"+id).remove();
          }
        }
    })
}

function saveDataUpdateTD(id){
  var eName=$('#eName').val();
  var eAddress=$('#eAddress').val();
  $.ajax({
        type:'POST',
        url:'{{route("suppliers.saveData")}}',
        data:{'_token':'<?php echo csrf_token()?>', 'id':id,'name':eName,'address':eAddress},
        success:function(data) {
          if(data.status=='OK'){
            alert(data.msg);
          $("#td_name_"+id).html(eName);
          $("#td_address_"+id).html(eAddress);
          }
        }
    })
}

</script>
@endsection