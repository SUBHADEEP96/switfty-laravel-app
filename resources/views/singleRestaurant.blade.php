@extends('layouts.admin')

@section('content')
    <div class="container text-center">    
         <!-- /.row -->
         <div class="row">         
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{$data['name']}}'s details:</h3>     
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Timing</th>
                      <th>Status</th>   
                      <th>Edit</th>
                      <th>Delete</th>                   
                    </tr>
                  </thead>
                  <tbody>
                  
                    <tr>
                      <td>{{$data['name']}} </a></td>                      
                      <td>{{$data['phone']}}</td>
                      <td>{{$data['address']}}</td>
                      <td>{{$data['opening']}} A:M - {{$data['closing']}} P:M</td>
                      <td>
                      @if($data["status"] == 1)
                      Active
                      @else
                      Inactive
                      @endif
                      </td>
                      <td> <a href="{{ url('update-restaurant/'.$data['id']) }}" class="btn btn-warning">Edit</a> </td>
                      <td><a  onclick="deleteArticle({{ $data->id }})" class="btn btn-danger">Delete</a></td>
                    </tr>
                 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        
        <!-- /.row -->
    </div>
@endsection
