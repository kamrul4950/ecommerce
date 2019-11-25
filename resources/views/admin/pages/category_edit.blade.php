@extends('admin.master.masterAdmin')

@section('content')
        <div class="col-md-9">
            <div class="card">
              <div class="card-head">
                <h2>Update Category</h2>
              </div>
              <div class="card-body">
                <form action="{{ route('admin.category.update',$categorys->id) }}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
              
              @include('admin.helper.massage')
              <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$categorys->name}}">
              </div>
              <div class="form-group">
                <label for="description">Category Description:</label>
                <textarea name="description" id="" cols="100" rows="8">{{$categorys->description}}</textarea>
              </div>
              
              <div class="form-group">
                <label for="image">Parent Category</label>
                <select class="form-control" name="parent_id">
                      <option value="">Please Select Parent Category</option>
                  @foreach($main_category as $cat)
                      <option value="{{$cat->id}}" {{$cat->id == $categorys->parent_id ? 'selected':'' }}>{{$cat->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="image">Old Category Image</label><br>
                <img src="{{ asset('images/category_image/'.$categorys->image) }}" width="100px">
                <input type="file" class="form-control-file" id="image" name="image">
              </div>
                          
              <button type="submit" class="btn btn-outline-success">Update Category</button>
            </form>

              </div>
            </div>
            
          </div>
@endsection
      		
