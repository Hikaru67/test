@extends('admin_layout')
@section('admin_content')

<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Quản lý đơn hàng</h4>
            <?php 
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message', null);
                    echo '<br>';
                }
            ?>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên người đặt hàng</th>
                                <th scope="col">Tổng giá tiền</th>
                                <th scope="col">Trạng thái</th>
                                {{-- <th scope="col">Ngày thêm</th> --}}
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_order as $key => $order)
                            <tr>
                                <th scope="row">{{$order->order_id}}</th>
                                <td>{{$order->customer_name}}</td>
                                <td><span class="text">{{$order->order_total}}</span></td>
                                <td>
                                    <span class="text">
                                        <?php
                                            if($order->order_status == 0){
                                        ?>
                                                Đang xử lý</span>
                                        <?php   }
                                            else{
                                        ?> 
                                                </span>
                                        <?php   }   ?> 
                                    </span>
                                </td>
                                {{-- <td><span class="status-p bg-primary">09 / 07 / 2018</span></td> --}}
                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-3"><a href="{{URL::to('/view-order/'.$order->order_id)}}" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                        <li><a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này không ?');" href="{{URL::to('/delete-order/'.$order->order_id)}}" class="text-danger"><i class="ti-trash"></i></a></li>
                                    </ul>
                                </td>
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