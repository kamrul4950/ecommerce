@extends('admin.master.masterAdmin')

@section('content')
        <div class="col-md-9">
            <div class="card">
              <div class="card-head">
                <h2>Add Brand</h2>
              </div>
              <div class="card-body">
                <form action="{{ route('admin.brand.store') }}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
              
              @include('admin.helper.massage')
              <div class="form-group">
                <label for="name">Brand Name:</label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
              <div class="form-group">
                <label for="description">Brand Description:</label>
                <textarea name="description" id="" cols="100" rows="8"></textarea>
              </div>
              <div class="form-group">
                <label for="image">Brand Image --Optional--</label>
                <input type="file" class="form-control-file" id="image" name="image">
              </div>
              

                          
              <button type="submit" class="btn btn-outline-success">Update Category</button>
            </form>

              </div>
            </div>
            
          </div>
@endsection
      		
