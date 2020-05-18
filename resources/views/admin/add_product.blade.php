@extends('admin_layout')
@section('admin_content')
<div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm
                        </header>
                        <?php
                        $message = Session::get('message');
                        if($message){
                            echo '<span class="text-alert">'.$message.'</span>';
                            Session::put('message', null);
                        }
                        ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="post" action="{{URL::to('/Save-Product')}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" 
                                    name="product_name" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" class="form-control" id="exampleInputEmail1" 
                                    name="product_image" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none;" rows="5" class="form-control " 
                                    name="product_desc" ></textarea>
                                </div>                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none;" rows="5" class="form-control " 
                                    name="product_content" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" 
                                    name="product_price" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                <select class="form-control m-bot15" name="product_status">
                                <option value="1">Hiện thị</option>
                                <option value="0">Ẩn</option>
                                </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Thương hiệu sản phẩm</label>
                                <select class="form-control m-bot15" name="product_brand">
                                @foreach($brand_product as $key => $values)
                                <option value="{{$values->brand_id}}">{{$values->brand_name}}</option>
                                @endforeach
                            	</select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Danh mục sản phẩm</label>
                                <select class="form-control m-bot15" name="product_category">
                                @foreach($cate_product as $key => $values)
                                <option value="{{$values->category_id}}">{{$values->category_name}}</option>
                                @endforeach
                                </select>
                                </div>
                                <button type="submit" class="btn btn-info">Thêm sản phẩm</button>
                                <?php
                                ?>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection