@extends('layouts.backend')

@section('content')
<form action="{{route("admin.category.store")}}" method="post">
    @csrf
    <div class="card shadow mb-12">
        <div class="card-header py-3">
            <button class="btn btn-outline-primary">Lưu thay đổi</button>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="form-group col-md-12">
                    <label>Tên Sản Phẩm </label>
                    <input required type="text" name="name" class="form-control" placeholder="Tên sản phẩm">
                </div>
               
                <div class="form-group col-md-12">
                    <label>Link Ảnh Sản Phẩm </label>
                    <input required type="text" name="image" class="form-control" placeholder="Link ảnh">
                </div>
             
            </div>
        </div>
    </div>
</form>
@endsection