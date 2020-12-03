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
                                                    <th scope="col">Tên danh mục</th>
                                                    <th scope="col">Slug</th>
                                                    <th scope="col">Trạng thái</th>
                                                    {{-- <th scope="col">Ngày thêm</th> --}}
                                                    <th scope="col">action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($all_category_product as $key => $cate_pro)
                                                <tr>
                                                    <th scope="row">{{$cate_pro->category_id}}</th>
                                                    <td>{{$cate_pro->category_name}}</td>
                                                    <td><span class="text">{{$cate_pro->slug_category_product}}</span></td>
                                                    <td>
                                                        <span class="text">
                                                            <?php
                                                                if($cate_pro->category_status == 1){
                                                            ?>
                                                                    <a href="{{URL::to('/unactive-category-product/'.$cate_pro->category_id)}}"><span class="fa-thums-styling fa fa-thumbs-up"></span></a>
                                                            <?php   }
                                                                else{
                                                            ?> 
                                                                    <a href="{{URL::to('/active-category-product/'.$cate_pro->category_id)}}"><span class="fa-thums-styling fa fa-thumbs-down"></span></a>
                                                            <?php   }   ?> 
                                                        </span>
                                                    </td>
                                                    {{-- <td><span class="status-p bg-primary">09 / 07 / 2018</span></td> --}}
                                                    <td>
                                                        <ul class="d-flex justify-content-center">
                                                            <li class="mr-3"><a href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                                            <li><a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này không ?');" href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}" class="text-danger"><i class="ti-trash"></i></a></li>
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