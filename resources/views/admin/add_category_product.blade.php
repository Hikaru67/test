@extends('admin_layout')
@section('admin_content')
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title"><center>Thêm danh mục sản phẩm</center></h4>
            <?php 
				$message = Session::get('message');
				if($message){
					echo '<span class="text-alert">'.$message.'</span>';
					Session::put('message', null);
					echo '<br>';
				}
			?>
            <form action="{{URL::to('/save-category-product')}}" method="post">
            	{{csrf_field()}}
                <div class="form-group">
                    <label for="category_product_name">Tên danh mục</label>
                    <input type="text" name="category_product_name" class="form-control" id="category_product_name" aria-describedby="emailHelp" placeholder="Tên danh mục">
                </div>
                <div class="form-group">
                    <label for="slug_category_product">Slug</label>
                    <input type="text" name="slug_category_product" class="form-control" id="slug_product_name" placeholder="Slug">
                </div>
                <div class="form-group">
                    <label for="category_product_desc">Mô tả danh mục</label>
                    <textarea style="resize: none" rows="8" name="category_product_desc" class="form-control" id="ckeditor" placeholder="Mô tả danh mục"></textarea>
                </div>
                <div class="form-group">
                    <label for="category_meta_keywords">Từ khóa danh mục</label>
                    <textarea style="resize: none" rows="8" name="category_meta_keywords" class="form-control" id="ckeditor2" placeholder="Mô tả danh mục"></textarea>
                </div>
				<div class="form-group">
	                <label class="col-form-label">Trạng thái</label>
	                <select name="category_product_status" class="form-control">
	                    <option value="1">Hiển thị</option>
	                    <option value="0">Ẩn</option>
	                </select>
	            </div>
                <button type="submit" name="add_category_product" class="btn btn-primary mt-4 pr-4 pl-4">Thêm danh mục</button>
            </form>
        </div>
    </div>
</div>
@endsection