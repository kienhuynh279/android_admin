@extends('layouts.backend')

@section('content')
<form action="{{route("admin.product.store")}}" method="post">
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
                    <label class="w-100" for="code">Loại sản phẩm</label>
                    <div class="w-100">
                        <select class="form-control" name="category">
                            <option value="0" aria-readonly="true">Ấn để chọn</option>
                            @foreach ($category as $item)
                            <option value="{{$item->id}}">{{$item->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label>Giá Sản Phẩm </label>
                    <input required type="text" name="price" class="form-control" placeholder="Giá sản phẩm">
                </div>
                <div class="form-group col-md-12">
                    <label>Link Ảnh Sản Phẩm </label>
                    <input required type="text" name="image" class="form-control" placeholder="Link ảnh">
                </div>
                <div class="form-group col-md-12">
                    <label>Mô Tả Sản Phẩm </label>
                    <input required type="text" name="desc" class="form-control" placeholder="Mô tả">
                </div>
            </div>
        </div>
    </div>
</form>
@endsection