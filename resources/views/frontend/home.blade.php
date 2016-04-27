@extends('frontend.app')

@section('title', 'Lara Ecommerce ')

@section('content')

    <div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				@include('frontend.slider')
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>30 Days return</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Free shipping</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Secure payments</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>New products</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            @include('frontend.latest')
        </div>
    </div> <!-- End main content area -->
    
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            <img src="{{ URL::asset('assets/img/brand1.png') }}" alt="">
                            <img src="{{ URL::asset('assets/img/brand2.png') }}" alt="">
                            <img src="{{ URL::asset('assets/img/brand3.png') }}" alt="">
                            <img src="{{ URL::asset('assets/img/brand4.png') }}" alt="">
                            <img src="{{ URL::asset('assets/img/brand5.png') }}" alt="">
                            <img src="{{ URL::asset('assets/img/brand6.png') }}" alt="">
                            <img src="{{ URL::asset('assets/img/brand1.png') }}" alt="">
                            <img src="{{ URL::asset('assets/img/brand2.png') }}" alt="">                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
    
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Top Sellers</h2>
                        @foreach($products as $product)

                            <div class="single-wid-product">
                                @foreach($product->photos as $key => $photo)
                                @if($key === 0)
                                    <a href="/{{$product->id}}"><img src="{{ $photo->paths }}" alt="{{$product->name}}" class="product-thumb"></a>
                                @endif

                                @endforeach
                                <h2><a href="/{{$product->id}}">{{$product->name}}</a></h2>
                                <div class="product-wid-price">
                                    <ins>${{$product->price}}</ins> <del>${{$product->old_price}}</del>
                                </div>                            
                            </div>

                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Recently Viewed</h2>
                        @foreach($products as $product)

                            <div class="single-wid-product">
                                @foreach($product->photos as $key => $photo)
                                @if($key === 0)
                                    <a href="/{{$product->id}}"><img src="{{ $photo->paths }}" alt="{{$product->name}}" class="product-thumb"></a>
                                @endif

                                @endforeach
                                
                                <h2><a href="/{{$product->id}}">{{$product->name}}</a></h2>
                                <div class="product-wid-price">
                                    <ins>${{$product->price}}</ins> <del>${{$product->old_price}}</del>
                                </div>                            
                            </div>

                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Top New</h2>
                        @foreach($products as $product)

                            <div class="single-wid-product">
                                @foreach($product->photos as $key => $photo)
                                @if($key === 0)
                                    <a href="/{{$product->id}}"><img src="{{ $photo->paths }}" alt="{{$product->name}}" class="product-thumb"></a>
                                @endif

                                @endforeach
                                <h2><a href="/{{$product->id}}">{{$product->name}}</a></h2>
                                <div class="product-wid-price">
                                    <ins>${{$product->price}}</ins> <del>${{$product->old_price}}</del>
                                </div>                            
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->

@endsection
