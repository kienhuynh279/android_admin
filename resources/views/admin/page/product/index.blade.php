@extends('layouts.backend')

@section('content')
<h1>Quản lí sản phẩm</h1>
<div class="card shadow mb-12">
    <div class="card-header py-3">
    <a href="{{route('admin.product.create')}}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-plus"></i>
            </span>
            <span class="text">Thêm sản phẩm</span>
          </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($product as $item)
                    <tr>
                        <th><img src="{{$item->product_image}}" alt="" height="70px"></th>
                        <th>{{$item->product_name}}</th>
                        <th>{{$item->product_price}}</th>

                        <td class="text-center font-size-sm">

                            <a title="Chỉnh sửa" class="btn btn-success btn-circle"
                                href="{{route('admin.product.edit', $item->id)}}">
                                <i class="fa fa-edit"></i>
                            </a>

                            <form class="d-none" id="action-destroy-{{$item->id}}"
                                action="{{route("admin.product.destroy", $item->id)}}" method="POST">
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