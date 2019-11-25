@extends('master.master')

@section('productcontent')
<!--Main section start here + product all include here-->   
        <div class="container-fluid">
            <div class="row margin-top-20">
            	
                @include('helper.iteamber')

                <div class="col-md-9">
                    <div class="widget">
                        <h2>Feature Product</h2>
                       <div class="row">
                           <div class="col-md-2">
                               <div class="card">

		
                                  <img class="card-img-top feature-image" src="{{asset('images/products/'.'image1.png')}}" alt="Card image">


                                  <div class="card-body">
                                    <h4 class="card-title">Samsung</h4>
                                    <p class="card-text">Price 10,000 Taka</p>
                                    <a href="#" class="btn btn-outline-warning">Add To Cart</a>
                                  </div>
                                </div>
                           </div>
                       </div> 
                    </div>

                </div>
            </div>
        </div>

        <!--Main section End here + product all include here-->
@endsection
