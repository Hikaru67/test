@extends('admin_layout')
@section('admin_content')
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title"><center>Cập nhật danh mục sản phẩm</center></h4>
            <?php 
				$message = Session::get('message');
				if($message){
					echo '<span class="text-alert">'.$message.'</span>';
					Session::put('message', null);
					echo '<br>';
				}
			?>
            @foreach($edit_category_product as $key => $edit_value)
            <form action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="post">
            	{{csrf_field()}}
                <div class="form-group">
                    <label for="category_product_name">Tên danh mục</label>
                    <input type="text" name="category_product_name" class="form-control" id="category_product_name" aria-describedby="emailHelp" placeholder="Tên danh mục" value="{{$edit_value->category_name}}">
                </div>
                <div class="form-group">
                    <label for="slug_category_product">Slug</label>
                    <input type="text" name="slug_category_product" value="{{$edit_value->slug_category_product}}" class="form-control" id="slug_product_name" placeholder="Slug">
                </div>
                <div class="form-group">
                    <label for="category_product_desc">Mô tả danh mục</label>
                    <textarea style="resize: none" rows="8" name="category_product_desc" class="form-control" id="ckeditor" placeholder="Mô tả danh mục">{{$edit_value->category_desc}}</textarea>
                </div>
                <div class="form-group">
                    <label for="category_meta_keywords">Từ khóa danh mục</label>
                    <textarea style="resize: none" rows="8" name="category_meta_keywords" class="form-control" id="ckeditor2" placeholder="Mô tả danh mục">{{$edit_value->meta_keywords}}</textarea>
                </div>

                <button type="submit" name="add_category_product" class="btn btn-primary mt-4 pr-4 pl-4">Cập nhật danh mục</button>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection