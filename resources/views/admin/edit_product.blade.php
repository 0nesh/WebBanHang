@extends('admin_layout')
@section('admin_content')
<div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật sản phẩm
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
                                @foreach($edit_product as $key => $values)
                                <form role="form" method="post" action="{{URL::to('/Update-Product/'.$values->product_id)}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" 
                                    name="product_name" value="{{$values->product_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" class="form-control" id="exampleInputEmail1" 
                                    name="product_image">
                                    <img src="{{URL::to('public/uploads/product/'.$values->product_image)}}">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none;" rows="5" class="form-control " 
                                    name="product_desc" >{{$values->product_desc}}</textarea>
                                </div>                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none;" rows="5" class="form-control " 
                                    name="product_content" >{{$values->product_content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" 
                                    name="product_price" value="{{$values->product_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trạng thái</label>
                                <select class="form-control m-bot15" name="product_status">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiện thị</option>

                                </select>
                                @endforeach
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
                                <button type="submit" class="btn btn-info">Cập nhật sản phẩm</button>
                                <?php
                                ?>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection