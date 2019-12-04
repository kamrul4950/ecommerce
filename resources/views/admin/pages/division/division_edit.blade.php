@extends('admin.master.masterAdmin')

@section('content')
        <div class="col-md-9">
            <div class="card">
              <div class="card-head">
                <h2>Update division</h2>
              </div>
              <div class="card-body">
                <form action="{{ route('admin.division.update',$division->id) }}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
              
              @include('admin.helper.massage')
              <div class="form-group">
                <label for="name">division Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$division->name}}">
              </div>
              <div class="form-group">
                <label for="priority">Division Priority</label>
                <input type="text" class="form-control" id="priority" name="priority" value="{{$division->priority}}">
                        
              <button type="submit" class="btn btn-outline-success mt-2">Update division</button>
            </form>

              </div>
            </div>
            
          </div>
@endsection
      		
