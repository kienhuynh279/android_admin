@extends('layouts.backend')

@section('content')
<form action="{{route("admin.cart.update", $cart->id)}}" method="post">
    @csrf
    @method("PUT")
    <div class="card shadow mb-12">
        <div class="card-header py-3">
            <button class="btn btn-outline-primary">Lưu thay đổi</button>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="form-group col-md-12">
                    <label>Tên Khách Hàng </label>
                    <input required type="text" name="name" class="form-control" placeholder="Tên khách hàng" value="{{$cart->tenkhachhang}}">
                </div>
                <div class="form-group col-md-12">
                  <label>Số Điện Thoại </label>
                  <input required type="text" name="phone" class="form-control" placeholder="Số điện thoại" value="{{$cart->sodienthoai}}">
              </div>
                <div class="form-group col-md-12">
                    <label>Email </label>
                    <input required type="text" name="email" class="form-control" placeholder="Email" value="{{$cart->email}}">
                </div>
             
            </div>
        </div>
    </div>
</form>
@endsection