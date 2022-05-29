<form role="form" method="POST" action="{{url('suppliers/'.$data->id)}}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                  <button type="button" class="close" 
                    data-dismiss="modal" aria-hidden="true"></button>
                  <h4 class="modal-title">Edit Supplier</h4>
                </div>
                <div class="modal-body">
                
                <div class="form-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control"  name="name" placeholder="Isikan nama supplier" value="{{$data->name}}">
                        <span class="help-block">
                        *Tulis nama perusahaan supplier </span>
                    </div>
                    
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control" rows="3">{{$data->address}}</textarea>
                    </div>

                    
                </div>
                    
                </div>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                    <button type="button" class="btn btn-default">Cancel</button>
                </div>
</form>