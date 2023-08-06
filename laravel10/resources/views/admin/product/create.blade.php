@extends('layouts.admin')
@section('title','create Category')
@section('main_admin')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Category</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../ad123/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../ad123/dist/css/adminlte.min.css">
</head>
<body>

<form action="{{route('product.store')}}" method="POST" role="form" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name" >
                    @error('name')
                    <small class="help-block" >{{$message}}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="textarea" name="description" class="form-control" id="content" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                      <select class="form-control" name="category_id" >
                        <option>--Select one--</option>
                        @foreach($cats as $cat)
                        <option value="{{$cat->id}} ">{{$cat->name}} </option>
                        @endforeach
                      </select>
                    </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="number" name="price" class="form-control" id="exampleInputEmail1" placeholder="Enter price">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputPassword1">Status</label><br>
                  <input type="radio" id="public" name="status" value="1" checked>
                  <label for="html">Public</label><br>
                   <input type="radio" id="private" name="status" value="0">
                  <label for="css">Private</label><br>
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <input type="file" name="upload" class="form-control" id="exampleInputEmail1" placeholder="Enter image" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image list</label>
                    <input type="textarea" name="image_list" class="form-control" id="exampleInputEmail1" placeholder="Enter image_list" >
                  </div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                @csrf
              </form>
</body>
</html>

@stop

@section('css')
<link rel="stylesheet" href="../../ad123/plugins/summernote/summernote-bs4.min.css">
@stop
@section('js')
<script src="../../ad123/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function(){
      $('#content').summernote({
          height:200,
          placeholder:" Input description"
      });
    })
</script>
@stop