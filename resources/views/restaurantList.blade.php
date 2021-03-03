@extends('layouts.admin')

@section('content')
    <div class="container text-center">
         <!-- /.row -->
         <div class="row">
          <div class="col-12">                     
             @if(Session::has('msg'))
            <div class="container">
            <div class="col-md-10 offset-md-1 text-center my-3">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('msg') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            </div>
            </div>            
            @endif
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Restaurant List</h3>     
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
                      <th>ID</th>
                      <th>Name</th>
                      
                      <!-- <th>Action</th> -->
                      <th>Status</th>                      
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $d)
                    <tr>
                      <td>{{$d['id']}}</td>
                      <td><a href="{{ url('/restaurants',$d['id'])}}"> {{$d['name']}} </a></td>                      
                      
                      <!-- <td>
                      <input type="hidden"  name="status" >
                      <input type="checkbox" name="status" {{ $d["status"] === 1 ? "checked":" "  }} >
                      </td> -->
                      <td>
                      @if($d["status"] == 1)
                      <a href="{{ url('/status-update',$d['id'])}}" class="btn btn-success">Active</a>
                      @else
                      <a href="{{ url('/status-update',$d['id'])}}" class="btn btn-danger">Inactive</a>
                      @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="container ">
                <span class="mr-auto">{{ $data->links() }}</span>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        
        <!-- /.row -->
    </div>
@endsection
