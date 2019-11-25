<!DOCTYPE html>
<html lang="en">
<head>
  <title>
    @yield('title')
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
  
</head>
<body>

<div class="container">
	<div class="heading_style">
		<h1 class="text-center">E-Shop Admin Panel</h1>
	</div>
  
  
  <div class="allcontent"><!--All body Content Start here-->
  <div class="wrapper"><!--Admin Nav Start here-->
            @include('admin.helper.top_nav_bar') <!--Top nav bar here-->
        </div><!--Admin Nav End here-->
      

      
      <div class="main_content top-padding-20px"><!--Main content + side menu bar Start here-->
      	<div class="row">
      		@include('admin.helper.adminsideber')<!--Admin Side bar here-->
      		@yield('content')<!--all product here-->
      	</div>
      </div><!--Main content + side menu bar End here-->
      	
      	<div class="container footer_class"><!--Footer section Start here-->
      		<p class="text-center">&copy; All maintense right E-Shop Adminstre</p>
      	</div><!--Footer section End here-->

      </div><!--All body Content End here-->

</div>
	

	<!--Script Start here -->
		  @include('admin.helper.admin_js')<!--Admin all JavaScript File here-->
	<!--Script End here -->
</body>
</html>