@extends('admin_layout')
@section('admin_content')

<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Thông tin khách hàng</h4>

            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Họ tên khách hàng</th>
                                <th scope="col">Số điện thoại</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{$order_by_id[0]->customer_id}}</th>
                                <td>{{$order_by_id[0]->customer_name}}</td>
                                <td>{{$order_by_id[0]->customer_phone}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Thông tin vận chuyển</h4>

            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên người vận chuyển</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Số điện thoại</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{$order_by_id[0]->shipping_id}}</th>
                                <td>{{$order_by_id[0]->shipping_name}}</td>
                                <td>{{$order_by_id[0]->shipping_address}}</td>
                                <td><span class="text">{{$order_by_id[0]->shipping_phone}}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Chi tiết đơn hàng</h4>

            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order_by_id as $value)
                            <tr>
                                <th scope="row">{{$value->product_id}}</th>
                                <td>{{$value->product_name}}</td>
                                <td>{{$value->product_sales_quantity}}</td>
                                <td><span class="text">{{number_format($value->product_price)}}</span></td>
                                <td>{{number_format($value->product_sales_quantity*$value->product_price)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection