@extends('admin.master.masterAdmin')

@section('content')
        <div class="col-md-9">
            <div class="card">
              <div class="card-head">
                <h2>Update brand</h2>
              </div>
              <div class="card-body">
                <form action="{{ route('admin.brand.update',$brands->id) }}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
              
              @include('admin.helper.massage')
              <div class="form-group">
                <label for="name">brand Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$brands->name}}">
              </div>
              <div class="form-group">
                <label for="description">brand Description:</label>
                <textarea name="description" id="" cols="100" rows="8">{{$brands->description}}</textarea>
              </div>
              
              <div class="form-group">
                <label for="image">Old brand Image</label><br>
                <img src="{{ asset('images/brand_image/'.$brands->image) }}" width="100px">
                <input type="file" class="form-control-file" id="image" name="image">
              </div>
                          
              <button type="submit" class="btn btn-outline-success">Update brand</button>
            </form>

              </div>
            </div>
            
          </div>
@endsection
      		
