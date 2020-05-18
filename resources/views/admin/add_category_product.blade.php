@extends('admin_layout')
@section('admin_content')
<div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục san phẩm
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
                                <form role="form" method="post" action="{{URL::to('/save-category')}}">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" 
                                    name="category_product_name" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea style="resize: none;" rows="5" class="form-control " 
                                    name="category_product_desc" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                <select class="form-control m-bot15" name="category_product_status">
                                <option value="1">Hiện thị</option>
                                <option value="0">Ẩn</option>
                            	</select>
                                </div>
                                <button type="submit" class="btn btn-info">Thêm danh mục</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection