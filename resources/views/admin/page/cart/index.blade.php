@extends('layouts.backend')

@section('content')
<h1>Quản lý đơn hàng</h1>
<div class="card shadow mb-12">
    <div class="card-header py-3">
        <a href="{{route('admin.cart.create')}}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tạo mới đơn hàng</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>

                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>E-mail</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cart as $item)
                    <tr>

                        <th>{{$item->tenkhachhang}}</th>
                        <th>{{$item->sodienthoai}}</th>
                        <th>{{$item->email}}</th>

                        <td class="text-center font-size-sm">

                            <a title="Chỉnh sửa" class="btn btn-success btn-circle"
                                href="{{route('admin.cart.edit', $item->id)}}">
                                <i class="fa fa-edit"></i>
                            </a>

                            <form class="d-none" id="action-destroy-{{$item->id}}"
                                action="{{route("admin.cart.destroy", $item->id)}}" method="POST">
                                @csrf
                                @method("DELETE")
                            </form>
                            <a title="Xóa" onclick="Helpers.confirmSubmit(null,'#action-destroy-{{$item->id}}')"
                                class="btn btn-danger btn-circle" href="javascript:void(0)">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>

                    </tr>
                    @empty
                    <td colspan="12">
                        <div class="alert alert-danger mb-0" role="alert">
                            No Value Data
                        </div>
                    </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function toSubmit(element) {
        let _element = document.querySelector(element);
    
        if(!_element) {
            throw Error(`Not found element with attribute Id, class "${element}"`)
        }
    
        if(_element.nodeName !== "FORM") {
            throw Error(`The "${element}" is a node ${_element.nodeName}, not a node FORM html`);
        }
    
        // passed all validate
        _element.submit();
    }
    
    function confirmSubmit(message, element) {
        if(confirm(message || "Are you sure, bạn chắc chứ ? ")) {
            // call submit
            toSubmit(element);
        }
    }
    
    const Helpers = {
        toSubmit,
        confirmSubmit
    }
    </script>
@endsection