
<ul class="list-group" id="accordion">
	@foreach(App\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)
		<a href="#main{{$parent->id}}" class="list-group-item" data-toggle="collapse" >
			<img src="{{ asset('images/category_image/'.$parent->image) }}" width="30px" alt=""> {{$parent->name}}
		</a>

	
	<div class="collapse
		@if (Route::is('category.show'))
			@if (App\Category::PrentOrNotCategory($parent->id,$category->id))
				show
			@endif
			{{-- expr --}}
		@endif
	" id="main{{$parent->id}}">
		@foreach(App\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
			<a href="{{ route('category.show',$child->id) }}" class="list-group-item
				@if (Route::is('category.show'))
					@if ($child->id == $category->id)
						active
					@endif
				@endif
				" data-parent="#accordion">
				<img src="{{ asset('images/category_image/'.$child->image) }}" width="30px" alt=""> {{$child->name}}
			</a>
		@endforeach
		
	</div>
	@endforeach

	


	

</ul>
