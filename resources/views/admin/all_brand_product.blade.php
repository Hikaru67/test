@extends('admin_layout')
@section('admin_content')
<div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Progress Table</h4>
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
                                                    <th scope="col">Tên thương hiệu</th>
                                                    <th scope="col">Trạng thái</th>
                                                    {{-- <th scope="col">Ngày thêm</th> --}}
                                                    <th scope="col">action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($all_brand_product as $key => $bra_pro)
                                                <tr>
                                                    <th scope="row">{{$bra_pro->brand_id}}</th>
                                                    <td>{{$bra_pro->brand_name}}</td>
                                                    <td>
                                                        <span class="text">
                                                            <?php
                                                                if($bra_pro->brand_status == 1){
                                                            ?>
                                                                    <a href="{{URL::to('/unactive-brand-product/'.$bra_pro->brand_id)}}"><span class="fa-thums-styling fa fa-thumbs-up"></span></a>
                                                            <?php   }
                                                                else{
                                                            ?> 
                                                                    <a href="{{URL::to('/active-brand-product/'.$bra_pro->brand_id)}}"><span class="fa-thums-styling fa fa-thumbs-down"></span></a>
                                                            <?php   }   ?> 
                                                        </span>
                                                    </td>
                                                    {{-- <td><span class="status-p bg-primary">09 / 07 / 2018</span></td> --}}
                                                    <td>
                                                        <ul class="d-flex justify-content-center">
                                                            <li class="mr-3"><a href="{{URL::to('/edit-brand-product/'.$bra_pro->brand_id)}}" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                                            <li><a onclick="return confirm('Bạn có chắc là muốn xóa thương hiệu này không ?');" href="{{URL::to('/delete-brand-product/'.$bra_pro->brand_id)}}" class="text-danger"><i class="ti-trash"></i></a></li>
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