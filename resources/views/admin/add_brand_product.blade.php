@extends('admin_layout')
@section('admin_content')
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title"><center>Thêm thương hiệu sản phẩm</center></h4>
            <?php 
				$message = Session::get('message');
				if($message){
					echo '<span class="text-alert">'.$message.'</span>';
					Session::put('message', null);
					echo '<br>';
				}
			?>
            <form action="{{URL::to('/save-brand-product')}}" method="post">
            	{{csrf_field()}}
                <div class="form-group">
                    <label for="brand_product_name">Tên thương hiệu</label>
                    <input type="text" data-validation="length" data-validation-length="min3" data-validation-error-msg="Tối thiểu 3 ký tự" name="brand_product_name" class="form-control" id="brand_product_name" aria-describedby="emailHelp" placeholder="Tên thương hiệu">
                </div>
                <div class="form-group">
                    <label for="slug_product_name">Slug</label>
                    <input type="text" name="slug_product_name" class="form-control" id="slug_product_name" placeholder="Slug">
                </div>
                <div class="form-group">
                    <label for="brand_product_desc">Mô tả thương hiệu</label>
                    <textarea style="resize: none" rows="8" name="brand_product_desc" class="form-control" id="ckeditor" placeholder="Mô tả thương hiệu"></textarea>
                </div>
				<div class="form-group">
	                <label class="col-form-label">Trạng thái</label>
	                <select name="brand_product_status" class="form-control">
	                    <option value="1">Hiển thị</option>
	                    <option value="0">Ẩn</option>
	                </select>
	            </div>
                <button type="submit" name="add_brand_product" class="btn btn-primary mt-4 pr-4 pl-4">Thêm thương hiệu</button>
            </form>
        </div>
    </div>
</div>
@endsection