@extends('admin.master.masterAdmin')

@section('content')
        <div class="col-md-9">
            <div class="card">
              <div class="card-head">
                <h2>Product Insert</h2>
              </div>
              <div class="card-body">
                <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
             
              @include('admin.helper.massage')
              <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title">
              </div>
              <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price">
              </div>
              <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="text" class="form-control" id="quantity" name="quantity">
              </div>
              <div class="form-group">
                <label for="categoryid">Select Category</label>
                <select class="form-control" name="category_id" id="category_id">
                  <option value="">Please Select A Category For This Product</option>
                    @foreach(App\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)
                      <option value="{{$parent->id}}">{{$parent->name}}</option>
                      @foreach(App\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
                        <option value="{{$child->id}}">---->{{$child->name}}</option>
                      @endforeach

                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="brandid">Select Brand</label>
                <select class="form-control" name="brand_id" id="brand_id">
                  <option value="">Please Select A Brand For This Product</option>
                  @foreach(App\Brand::orderBy('name','asc')->get() as $brand)
                      <option value="{{$brand->id}}">{{$brand->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="description">Product Description:</label>
                <textarea name="description" id="" cols="100" rows="8"></textarea>
              </div>
              <div class="form-group">
                <label for="product_image">Product Image</label>
                <div class="row">
                  <div class="col-md-3">
                    <input type="file" class="form-control-file" id="image" name="product_image[]">
                  </div>

                  <div class="col-md-3">
                    <input type="file" class="form-control-file" id="image" name="product_image[]">
                  </div>

                  <div class="col-md-3">
                    <input type="file" class="form-control-file" id="image" name="product_image[]">
                  </div>

                  <div class="col-md-3">
                    <input type="file" class="form-control-file" id="image" name="product_image[]">
                  </div>
                </div>
                
              </div>
                          
              <button type="submit" class="btn btn-outline-success">Add Product</button>
            </form>

              </div>
            </div>
            
          </div>
@endsection
      		
