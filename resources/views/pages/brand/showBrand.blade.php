@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
                        @foreach($brand_name as $key => $values)
                        <h2 class="title text-center">{{$values->brand_name}}</h2>
                        @endforeach
                        @foreach($brand_by_id as $key => $values)
                        {{-- <a href="{{URL::to('chi-tiet-san-pham/'.$values->product_id)}}"> --}}
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{URL::to('public/uploads/product/'.$values->product_image)}}" alt="" width="100" height="220" />
                                            <h2>{{number_format($values->product_price)}} VNĐ</h2>
                                            <p>{{$values->product_name}}</p>
                                            <a href="{{URL::to('chi-tiet-san-pham/'.$values->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Chi tiết sản phẩm</a>
                                        </div>
                                        
                                </div>
                                
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Thêm yêu thích</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Thêm so sánh</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{-- </a> --}}
                        @endforeach
                    </div><!--features_items-->


@endsection