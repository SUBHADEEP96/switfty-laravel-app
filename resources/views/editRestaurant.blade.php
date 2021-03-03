@extends('layouts.admin')

@section('content')
    <div class="container">
         
    <!-- Main content -->
    <section class="content ">
      <div class="row">
      @if(Session::has('msg'))
            <div class="container">
            <div class="col-md-6 offset-md-3 text-center my-3">
            <div class="alert alert-dark alert-dismissible fade show" role="alert">
            <strong class="text-white">{{ Session::get('msg') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            </div>
            </div>            
            @endif
        <div class="col-md-6 offset-md-3">
          <div class="card card-dark mt-2">
            <div class="card-header">
              <h3 class="card-title">Update record</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
            <form action="{{ url('update-restaurant/'.$restaurant['id']) }}" method="post">
            @csrf
              <div class="form-group">
                <label >Restaurant Name</label>
                <input type="text"  name="name" value="{{old('name',$restaurant['name'])}}"  class="form-control">
                @error('name')
                <div class="text-danger my-2">
                {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label >UUID</label>
                <input type="text"  name="uuid" value="{{old('uuid',$restaurant['uuid'])}}"  class="form-control">
                
              </div>

              <div class="form-group">
                <label >Restaurant Address</label>
                <textarea  class="form-control"  name="address"  rows="4">{{old('address',$restaurant['address'])}}</textarea>
                @error('address')
                <div class="text-danger my-2">
                {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label >Status</label>
                <select name="status"  class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
                @error('status')
                <div class="text-danger my-2">
                {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label >Restaurant Phone</label>
                <input type="text" name="phone" value="{{old('phone',$restaurant['phone'])}}" class="form-control">
                @error('phone')
                <div class="text-danger my-2">
                {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label >Opening Time</label>
                <input type="time" name="opening" class="form-control" value="{{old('phone',$restaurant['opening'])}}">
                @error('opening')
                <div class="text-danger my-2">
                {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label >Closing Time</label>
                <input type="time" name="closing" class="form-control" value="{{old('closing',$restaurant['closing'])}}">
                @error('closing')
                <div class="text-danger my-2">
                {{ $message }}
                </div>
                @enderror
              </div>
              
              <input type="submit" value="Update" class="btn btn-dark float-right">
            
            </form>
             
  
            </div>

  
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>


    </section>
    <!-- /.content -->
    </div>
@endsection
