@extends('admin.master.masterAdmin')

@section('content')
      <div class="col-md-9">
            <div class="card">
                <div class="card-head">
                  <h2>All Districts</h2>
                </div>
                @include('admin.helper.massage')
                <div class="card-body">
                  <table class="table table-striped">
                    <tr>
                      <th>No</th>
                      <th>District Name</th>
                      <th>Division Name</th>
                      <th>Action</th>
                    </tr>
                    @php
                      $i=0;
                    @endphp
                    @foreach($districts as $district)
                      <tr>
                        <td>{{++$i }}</td>
                        <td>{{ $district->name }}</td>
                        <td>{{ $district->division->name }}</td>
                        
                        <td>
                          <a href="{{ route('admin.district.edit', $district->id) }}" class="btn btn-success">Edit</a>
                           <a href="#myData{{$district->id}}" class="btn btn-danger" data-toggle="modal">Detete</a>
                            
                            <div class="modal" id="myData{{$district->id}}">
                              <div class="modal-dialog">
                                <div class="modal-content">

                                  <div class="modal-header">
                                    <div class="modal-title">
                                      <h6>Are you sure want to Delete --{{$district->name}}--?</h6>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>

                                  <div class="modal-body">
                                    <p>If you want don't remove this data click Cancel</p>
                                  </div>

                                  <div class="modal-footer">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <form action="{{ route('admin.district.delete',$district->id) }}"method="post" >
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
                    {{ $districts->links() }}
                  </div>

                </div>   
            </div>
            
            
          </div>
@endsection