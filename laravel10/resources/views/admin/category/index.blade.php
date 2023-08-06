@extends('layouts.admin')
@sec tion('title','Category')
@section('main_admin')

<form Action=""  class="form-inline">
    <div class="form-group">
        <input type="text" name="key"  class="form-control" placeholder="Search by name" >
    </div>
        <button type="submit" class="btn btn-primary">
         <i class="fas fa-search"></i>
        </button>

</form>
<hr>
<table class="table">
    <thead>
        <tr>
             <th>ID</th>
            <th>Name</th>
            <th>Total Product</th>
            <th>Status</th>
            <th>Created Date</th>
            <th class="text-right">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($data as $cat)
        <tr>

            <td>{{$cat->id}}</td>
            <td>{{$cat->name}}</td>
            <td>{{$cat->products->count()}}</td>
            <td>
                @if($cat->status==0)
                    <span class="badge badge-danger ">Private</span>
                @else
                <span class="badge badge-success ">Public</span>
                @endif
            </td>
             <td>{{$cat->created_at->format('m-d-y')}}</td>
             <td class="text-right">
                <a href="{{route('category.edit',$cat->id)}} " class="btn btn-sm btn-success  "><i class="fas fa-edit"></i>  </a>
                <a href="{{route('category.destroy',$cat->id)}} " class="btn btn-sm btn-danger btn_delete "><i class="fas fa-trash"></i>  </a>
             </td>
        </tr>
        @endforeach
    </tbody>
</table>
<hr>
<!-- phan trang -->
<div class="">
        {{$data->appends(request()->all())->links()}}
</div>
@stop
 <!-- xoa danh mua bang js -->
    <form Action="" method="POST" id="form_delete">
    @csrf @method('DELETE')
    </form>
    @section('js')
    <script>
        $('.btn_delete').click(function(ev){
            ev.preventDefault();
            var _href = $(this).attr('href');
            $('form#form_delete').attr('Action',_href);
            if(confirm('Bạn có chắc muốn xóa danh mục này không?')){
                $('form#form_delete').submit();
        }
    })
    </script>

    @stop