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
                <label for="description">Product Description:</label>
                <textarea name="description" id="" cols="100" rows="8"></textarea>
              </div>
              <div class="form-group">
                <label for="product_image">Product Image</label>
                <input type="file" class="form-control-file" id="image" name="product_image">
              </div>
                          
              <button type="submit" class="btn btn-outline-success">Add Product</button>
            </form>

              </div>
            </div>
            
          </div>
@endsection
      		
