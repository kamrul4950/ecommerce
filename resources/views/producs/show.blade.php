@extends('master.master')
@section('title')
  {{$products->title}} || E-Shop
@endsection
@section('productcontent')
<!--Main section start here + product all include here-->   
        <div class="container">
            <div class="row margin-top-20">
              <div class="col-md-3">
              <!--Single product galary show slider start here-->
                  <div id="demo" class="carousel slide" data-ride="carousel">

                      <!-- Indicators -->
                      <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                      </ul>
                      
                      <!-- The slideshow -->
                      <div class="single-product-bg carousel-inner">
                        @php
                          $i=0;
                        @endphp
                        @foreach($products->images as $image)
                          <div class="carousel-item {{$i==1 ? 'active':''}}">
                            <img src="{{ asset('images/products/'.$image->image) }}" alt="">
                          </div>
                        @php
                          $i++;
                        @endphp
                        @endforeach
                        

                        
                      </div>
                      
                      <!-- Left and right controls -->
                      <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                      </a>
                      <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                      </a>
                    </div>
                  </div>
              <!--Single product galary show slider end here-->
                

                <div class="col-md-9">
                    <div class="widget">
                        <h3>{{$products->title}}</h3>
                        <h4 class="product-price-collor">{{$products->price}}/= Taka 
                          <span class="btn btn-warning">
                            {{$products->quantity < 1 ? 'No Iteam Is avilable': $products->quantity .' Iteam In Stock'}}
                          </span>
                        </h4><hr>
                        <p>
                          {{$products->description}}
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <!--Main section End here + product all include here-->
@endsection
