@extends('admin_layout')
@section('admin_content')
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title"><center>Cập nhật sản phẩm</center></h4>
            <?php 
				$message = Session::get('message');
				if($message){
					echo '<span class="text-alert">'.$message.'</span>';
					Session::put('message', null);
					echo '<br>';
				}
			?>
            @foreach($edit_product as $key => $edit_value)
            <form action="{{URL::to('/update-product/'.$edit_value->product_id)}}" method="post" enctype="multipart/form-data">
            	{{csrf_field()}}
                <div class="form-group">
                    <label for="product_name">Tên sản phẩm</label>
                    <input type="text" name="product_name" class="form-control" id="product_name" aria-describedby="emailHelp" placeholder="Tên" value="{{$edit_value->product_name}}">
                </div>
                <div class="form-group">
                    <label for="product_price">Giá sản phẩm</label>
                    <input type="text" name="product_price" value="{{$edit_value->product_price}}" class="form-control" id="product_name" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="product_image">Hình ảnh sản phẩm</label>
                    <input type="file" name="product_image" value="{{$edit_value->product_image}}" class="form-control" id="product_name" aria-describedby="emailHelp">
                    <input type="text" name="product_image_old" value="{{$edit_value->product_image}}" class="form-control" id="product_name" hidden>
                    <img src="{{URL::to('public/uploads/product/'.$edit_value->product_image)}}" height="100" width="100">
                </div>
                <div class="form-group">
                    <label for="product_desc">Mô tả sản phẩm</label>
                    <textarea style="resize: none" rows="8" name="product_desc" class="form-control" id="ckeditor">{{$edit_value->product_desc}}</textarea>
                </div>
                <div class="form-group">
                    <label for="product_content">Nội dung sản phẩm</label>
                    <textarea style="resize: none" rows="8" name="product_content" class="form-control" id="ckeditor2">{{$edit_value->product_content}}</textarea>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Danh mục sản phẩm</label>
                    <select name="product_category" class="form-control">
                        @foreach($category_product as $key => $cate)
                            <?php if($cate->category_id==$edit_value->product_id){ ?>
                                <option value="{{$cate->category_id}}" selected>{{$cate->category_name}}</option>
                            <?php } else {?>
                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                            <?php } ?>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Thương hiệu</label>
                    <select name="product_brand" onselect="{{$edit_value->product_name}}" class="form-control">
                        @foreach($brand_product as $key => $brand)
                            <?php if($cate->category_id==$edit_value->product_id){ ?>
                                <option value="{{$cate->category_id}}" selected>{{$cate->category_name}}</option>
                            <?php } else {?>
                            <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                            <?php } ?>
                        @endforeach
                    </select>
                </div>

                <button type="submit" name="add_product" class="btn btn-primary mt-4 pr-4 pl-4">Cập nhật</button>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection