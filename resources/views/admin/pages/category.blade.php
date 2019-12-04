@extends('admin.master.masterAdmin')

@section('content')
      <div class="col-md-9">
            <div class="card">
                <div class="card-head">
                  <h2>All Categorys</h2>
                </div>
                @include('admin.helper.massage')
                <div class="card-body">
                  <table class="table table-striped">
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Category Image</th>
                      <th>Parent Id</th>
                      <th>Action</th>
                    </tr>
                    @php
                      $i=0;
                    @endphp
                    @foreach($categorys as $category)
                      <tr>
                        <td>{{++$i }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                          <img src="{{ asset('images/category_image/'.$category->image) }}" width="30px">
                        </td>
                        <td>
                          @if($category->parent_id == NULL)
                            <p class="text-color">Primary Category</p>
                            @else
                              {{ $category->parent->name }}
                          @endif
                        </td>
                        <td>
                          <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-success">Edit</a>
                           <a href="#myData{{$category->id}}" class="btn btn-danger" data-toggle="modal">Detete</a>
                            
                            <div class="modal" id="myData{{$category->id}}">
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
                                        <form action="{{ route('admin.category.delete',$category->id) }}"method="post" >
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
                    
                  </table><!--Table End here-->
                  <div class="pagination">
                    {{ $categorys->links() }}
                  </div>

                </div>   
            </div>
            
            
          </div>
@endsection