@extends('admin.master.masterAdmin')

@section('content')
      <div class="col-md-9">
            <div class="card">
                <div class="card-head">
                  <h2>All Divisions</h2>
                </div>
                @include('admin.helper.massage')
                <div class="card-body">
                  <table class="table table-striped">
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Priority</th>
                      <th>Action</th>
                    </tr>
                    @php
                      $i=0;
                    @endphp
                    @foreach($divisions as $division)
                      <tr>
                        <td>{{++$i }}</td>
                        <td>{{ $division->name }}</td>
                        <td>{{ $division->priority }}</td>
                        
                        <td>
                          <a href="{{ route('admin.division.edit', $division->id) }}" class="btn btn-success">Edit</a>
                           <a href="#myData{{$division->id}}" class="btn btn-danger" data-toggle="modal">Detete</a>
                            
                            <div class="modal" id="myData{{$division->id}}">
                              <div class="modal-dialog">
                                <div class="modal-content">

                                  <div class="modal-header">
                                    <div class="modal-title">
                                      <h6>Are you sure want to Delete --{{$division->name}}--?</h6>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>

                                  <div class="modal-body">
                                    <p>If you want don't remove this data click Cancel</p>
                                  </div>

                                  <div class="modal-footer">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <form action="{{ route('admin.division.delete',$division->id) }}"method="post" >
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
                    {{ $divisions->links() }}
                  </div>

                </div>   
            </div>
            
            
          </div>
@endsection