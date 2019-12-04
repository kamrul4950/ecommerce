@extends('admin.master.masterAdmin')

@section('content')
        <div class="col-md-9">
            <div class="card">
              <div class="card-head">
                <h2>Add Division</h2>
              </div>
              <div class="card-body">
                <form action="{{ route('admin.division.store') }}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
              
              @include('admin.helper.massage')
              <div class="form-group">
                <label for="name">Division Name:</label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
              <div class="form-group">
                <label for="description">Division Priority</label>
                <input type="text" class="form-control" id="description" name="priority">
              </div>
              

                          
              <button type="submit" class="btn btn-outline-success">Create Division</button>
            </form>

              </div>
            </div>
            
          </div>
@endsection
      		
