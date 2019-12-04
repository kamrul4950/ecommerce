@extends('admin.master.masterAdmin')

@section('content')
        <div class="col-md-9">
            <div class="card">
              <div class="card-head">
                <h2>Update District</h2>
              </div>
              <div class="card-body">
                <form action="{{ route('admin.district.update',$district->id) }}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
              
              @include('admin.helper.massage')
              <div class="form-group">
                <label for="name">District Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$district->name}}">
              </div>
              <div class="form-group">
                <label for="description">Please Select Division For This District</label>
                <select name="division_id" id="" class="form-control">
                  <option value="">Please Select Division For This District</option>
                  @foreach($divisions as $divison)
                  <option value="{{"$divison->id"}}" {{$district->division->id == $divison->id ? 'selected':'' }}>{{$divison->name}}</option>
                  @endforeach
                </select>
              </div>
              

                          
              <button type="submit" class="btn btn-outline-success">Update District</button>
            </form>

              </div>
            </div>
            
          </div>
@endsection
      		
