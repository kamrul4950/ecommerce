@extends('master.master')

@section('productcontent')
<!--Main section start here + product all include here-->   
        <div class="container-fluid">
            <div class="row margin-top-20">
              <div class="col-md-3">
                @include('helper.iteamber')
              </div>
                <div class="col-md-9">
                    <div class="widget">
                        <h2>All Products by <span class="badge badge-info">{{$category->name}}</span> </h2>
                        @php
                          $products = $category->products;
                        @endphp

                        @if($products->count() > 0)

                        <div class="row">

                            @foreach($products as $product)

                              <div class="col-md-2">
                                   <div class="card">
                                    @php
                                      $i=1;
                                    @endphp
                                    @foreach($product->images as $image)
                                    @if($i>0)
                                      <a href="{{ route('product.show',$product->slug) }}">
                                        <img class="card-img-top feature-image" src="{{asset('images/products/'.$image->image)}}" alt="{{$product->title}}">
                                      </a>
                                    @endif
                                    @php
                                      $i--;
                                    @endphp
                                    @endforeach
                                      

                                      <div class="card-body">
                                        <h4 class="card-title"><a href="{{ route('product.show',$product->slug) }}">{{$product->title}}</a></h4>
                                        <p class="card-text">Price {{$product->price}} Taka</p>
                                        <a href="#" class="btn btn-outline-warning">Add To Cart</a>
                                      </div>
                                    </div>
                               </div>

                            @endforeach

                               

                           </div>
                           @else

                            <div class="alert alert-warning">
                              No Product By This Category..!!
                            </div>

                        @endif
                        
                    </div>

                </div>
            </div>
        </div>

        <!--Main section End here + product all include here-->
@endsection
