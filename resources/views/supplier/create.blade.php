
@extends('layout.conquer')
@section('content')
<h3 class="page-title">
			Tambah Supplier | <small>Form Tambah Supplier Baru</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Tambah Supplier</a>
						<i class="fa fa-angle-right"></i>
					</li>
				</ul>
				<div class="page-toolbar">
					<!-- tempat action button -->
				</div>
</div>
<div class="container">
    <!-- <div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i> Isikan data supplier
            </div>
            <div class="tools">
                <a href="" class="collapse"></a>
            </div>
        </div>
        <div class="portlet-body form"> -->
            <form role="form" method="POST" action="{{url('suppliers')}}">
                @csrf
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

                    <div class="form-group">
                        <label>Category</label>
                        <select name="id_category" class="form-control" >
                            <option>--pilih--</option>
                            @foreach($categories as $c)
                                <option value="{{$c->id}}">{{$c->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-info">Submit</button>
                    <button type="button" class="btn btn-default">Cancel</button>
                </div>
                <!-- <div class="form-actions">
                </div> -->
            </form>
        <!-- </div>
    </div> -->
</div>

    

  

@endsection


