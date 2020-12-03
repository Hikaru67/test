@extends('admin_layout')
@section('admin_content')
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title"><center>Cập nhật thương hiệu sản phẩm</center></h4>
            <?php 
				$message = Session::get('message');
				if($message){
					echo '<span class="text-alert">'.$message.'</span>';
					Session::put('message', null);
					echo '<br>';
				}
			?>
            @foreach($edit_brand_product as $key => $edit_value)
            <form action="{{URL::to('/update-brand-product/'.$edit_value->brand_id)}}" method="post">
            	{{csrf_field()}}
                <div class="form-group">
                    <label for="brand_product_name">Tên thương hiệu</label>
                    <input type="text" name="brand_product_name" class="form-control" id="brand_product_name" aria-describedby="emailHelp" placeholder="Tên thương hiệu" value="{{$edit_value->brand_name}}">
                </div>
                <div class="form-group">
                    <label for="slug_product_name">Slug</label>
                    <input type="text" name="slug_product_name" value="{{$edit_value->brand_slug}} class="form-control" id="slug_product_name" placeholder="Slug">
                </div>
                <div class="form-group">
                    <label for="brand_product_desc">Mô tả thương hiệu</label>
                    <textarea style="resize: none" rows="8" name="brand_product_desc" class="form-control" id="ckeditor" placeholder="Mô tả thương hiệu">{{$edit_value->brand_desc}}</textarea>
                </div>

                <button type="submit" name="add_brand_product" class="btn btn-primary mt-4 pr-4 pl-4">Cập nhật thương hiệu</button>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection