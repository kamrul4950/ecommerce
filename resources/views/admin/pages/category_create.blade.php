@extends('admin.master.masterAdmin')

@section('content')
        <div class="col-md-9">
            <div class="card">
              <div class="card-head">
                <h2>Add Category</h2>
              </div>
              <div class="card-body">
                <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
              
              @include('admin.helper.massage')
              <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
              <div class="form-group">
                <label for="description">Category Description:</label>
                <textarea name="description" id="" cols="100" rows="8"></textarea>
              </div>
              <div class="form-group">
                <label for="image">Category Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
              </div>
              <div class="form-group">
                <label for="image">Parent Category</label>
                <select class="form-control" name="parent_id">
                  @foreach($main_category as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>

                          
              <button type="submit" class="btn btn-outline-success">Update Category</button>
            </form>

              </div>
            </div>
            
          </div>
@endsection
      		
