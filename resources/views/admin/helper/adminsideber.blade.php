		<div class="col-md-3">
  			<ul class="list-group" id="accordion">
  				<a href="" class="list-group-item" data-toggle="collapse" data-target="#category">Category Manage</a>

				<div class="collapse" id="category">
					<a href="{{ route('admin.category') }}" class="list-group-item" data-parent="#accordion" >All Category</a>
					<a href="{{ route('admin.category.create') }}" class="list-group-item" data-parent="#accordion" >Add Category</a>
				</div>
  				
  				
  			</ul>

  			<ul class="list-group" id="accordion">
  				<a href="" class="list-group-item" data-toggle="collapse" data-target="#brand">Brand Manage</a>

  				<div class="collapse" id="brand">
  					<a href="{{ route('admin.brands') }}" class="list-group-item" data-parent="accordion">All Brands</a>

  					<a href="{{ route('admin.brand.create') }}" class="list-group-item" data-parent="accordion">Add Brand</a>
  					
  				</div>
  			</ul>

        <ul class="list-group" id="accordion">
          <a href="" class="list-group-item" data-toggle="collapse" data-target="#division">Division Manage</a>

          <div class="collapse" id="division">
            <a href="{{ route('admin.division') }}" class="list-group-item" data-parent="accordion">All Division</a>
            <a href="{{ route('admin.division.create') }}" class="list-group-item" data-parent="accordion">Add Division</a>
            
          </div>
        </ul>

        <ul class="list-group" id="accrodion">
          <a href="" class="list-group-item" data-toggle="collapse" data-target="#district">District Management</a>
          <div class="collapse" id="district">
            <a href="{{ route('admin.district') }}" class="list-group-item" data-parent="accordion" >All District</a>
            <a href="{{ route('admin.district.create') }}" class="list-group-item" data-parent="accrodion">Add District</a>          
          </div>
        </ul>
		 </div>