@extends('frontend.app')

@section('title', 'Search - Lara Ecommerce ')

@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Search</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                
                @include('frontend.sidebar')
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        
                        <div class="row">
                            @if(count($products))
                                @foreach($products as $product)
                                <div class="col-md-4 col-sm-6">
                                    <div class="single-shop-product">
                                        <div class="product-upper">
                                            @foreach($product->photos as $key => $photo)
                                                @if($key === 0)
                                                    <img src="{{ $photo->paths }}" alt="" class="shop-product-img">
                                                @endif
                                            @endforeach
                                        </div>
                                        <h2><a href="/{{ $product->id }}">{{ $product->name }}</a></h2>
                                        <div class="product-carousel-price">
                                            <ins>${{ $product->price }}</ins> <del>${{ $product->old_price }}</del>
                                        </div>  
                                        
                                        <div class="product-option-shop">
                                        {!! Form::open(array('method' => 'post', 'route' => ['addToCart', $product->id])) !!}
                                            <button type="submit" class="btn btn-primary">Add to cart</button>
                                        {!! Form::close() !!}
                                        </div>                       
                                    </div>
                                </div>
                                @endforeach
                            @else 
                                <h3>Sorry, Nothing found</h3>
                            @endif

                        </div>
                        
                       
                    </div>                    
                </div>
            </div>
        </div>
    </div>
@endsection