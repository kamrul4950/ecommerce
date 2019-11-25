@extends('admin.master.masterAdmin')

@section('content')
      <div class="col-md-9">
            <div class="card">
                <div class="card-head">
                  <h2>All Products</h2>
                </div>
                @include('admin.helper.massage')
                <div class="card-body">
                  <table class="table table-striped">
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Action</th>
                    </tr>
                    @foreach($products as $product)
                      <tr>
                        <td>#</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }} Taka</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                          <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-success">Edit</a>
                           <a href="#myData{{$product->id}}" class="btn btn-danger" data-toggle="modal">Detete</a>
                            
                            <div class="modal" id="myData{{$product->id}}">
                              <div class="modal-dialog">
                                <div class="modal-content">

                                  <div class="modal-header">
                                    <div class="modal-title">
                                      <h6>Are you sure want to Delete ?</h6>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>

                                  <div class="modal-body">
                                    <p>If you want don't remove this data click Cancel</p>
                                  </div>

                                  <div class="modal-footer">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <form action="{{ route('admin.product.delete',$product->id) }}"method="post" >
                                          {{ csrf_field() }}
                                          <button type="submit" class="btn btn-danger">Delete</button>
                                          
                                        </form>
                                      </div>
                                      <div class="col-md-6">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                      </div>
                                    </div>
                                  </div>
          

                                </div>
                              </div>
                            </div>

                        </td>
                      </tr>
                    @endforeach
                    
                  </table>

                </div>   
            </div>
            
            
          </div>
@endsection