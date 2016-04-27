@extends('frontend.app')

@section('title',  $product->name  . ' - Lara Commerce')

@section('content')

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
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
                        <div class="product-breadcroumb">
                            <a href="">Home</a>
                            <a href="">Category Name</a>
                            <a href="">Sony Smart TV - 2015</a>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                    	@foreach($product->photos as $key => $photo)

                                    	@if($key === 0)
                                        	<img src="{{ $photo->paths }}" alt="">                                    		
                                    	@endif

                                    	@endforeach
                                    </div>
                                    
                                    <div class="product-gallery">
                                    	@foreach($product->photos as $key => $photo)

	                                    	<img src="{{ $photo->paths }}" alt="">

                                    	@endforeach
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">{{ $product->name }}</h2>
                                    <div class="product-inner-price">
                                        <ins>${{ $product->price }}</ins> <del>${{ $product->old_price }}</del>
                                    </div>    
                                    {!! Form::open(array('method' => 'post', 'route' => ['addToCart', $product->id])) !!}
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" type="submit">Add to cart</button>
                                    {!! Form::close() !!}
                                    
                                    <div class="product-inner-category">
                                        <p>Category: 

                                        @foreach($product->categories as $category)
											<a href="/categories/{{ $category->name }}"> {{ $category->name }} </a>
										@endforeach

										. Tags: 
										@foreach($product->tags as $tag)
											<a href="/tags/{{ $tag->name }}"> {{ $tag->name }} </a>
										@endforeach
										</p>
                                    </div> 
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>  
                                                <p>{{ $product->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                       
                    </div>                    
                </div>
            </div>
        </div>
    </div>

@endsection