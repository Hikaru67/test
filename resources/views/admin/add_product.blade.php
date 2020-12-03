@extends('admin_layout')
@section('admin_content')
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title"><center>Thêm sản phẩm</center></h4>
            <?php 
				$message = Session::get('message');
				if($message){
					echo '<span class="text-alert">'.$message.'</span>';
					Session::put('message', null);
					echo '<br>';
				}
			?>
            <form action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
            	{{csrf_field()}}
                <div class="form-group">
                    <label for="product_name">Tên sản phẩm</label>
                    <input type="text" data-validation="length" data-validation-length="min3" data-validation-error-msg="Tối thiểu 3 ký tự" name="product_name" class="form-control" id="product_name" aria-describedby="emailHelp" placeholder="Tên sản phẩm">
                </div>
                <div class="form-group">
                    <label for="product_price">Giá sản phẩm</label>
                    <input type="text" name="product_price" class="form-control" id="product_name" aria-describedby="emailHelp" placeholder="Tên sản phẩm">
                </div>
                <div class="form-group">
                    <label for="product_image">Hình ảnh sản phẩm</label>
                    <input type="file" name="product_image" class="form-control" id="product_name" aria-describedby="emailHelp" placeholder="Tên sản phẩm">
                </div>
                <div class="form-group">
                    <label for="product_desc">Mô tả sản phẩm</label>
                    <textarea style="resize: none" rows="8" name="product_desc" class="form-control" id="ckeditor" placeholder="Mô tả sản phẩm"></textarea>
                </div>
                <div class="form-group">
                    <label for="product_content">Nội dung sản phẩm</label>
                    <textarea style="resize: none" rows="8" name="product_content" class="form-control" id="ckeditor2" placeholder="Mô tả sản phẩm"></textarea>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Danh mục sản phẩm</label>
                    <select name="product_category" class="form-control">
                        @foreach($category_product as $key => $cate)
                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Thương hiệu</label>
                    <select name="product_brand" class="form-control">
                        @foreach($brand_product as $key => $brand)
                            <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                        @endforeach
                    </select>
                </div>
				<div class="form-group">
	                <label class="col-form-label">Trạng thái</label>
	                <select name="product_status" class="form-control">
	                    <option value="1">Hiển thị</option>
	                    <option value="0">Ẩn</option>
	                </select>
	            </div>
                <button type="submit" name="add_product" class="btn btn-primary mt-4 pr-4 pl-4">Thêm sản phẩm</button>
            </form>
        </div>
    </div>
</div>
@endsection