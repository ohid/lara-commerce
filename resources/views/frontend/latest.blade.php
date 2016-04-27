
<div class="row">
    <div class="col-md-12">
        <div class="latest-product">
            <h2 class="section-title">Latest Products</h2>
            <div class="product-carousel">

                @foreach($latests as $latest)       

                    <div class="single-product">
                        <div class="product-f-image">
                            @foreach($latest->photos as $key => $photo)
                               @if ($key === 0) 
                                    <img src="{{ $photo->paths }}" alt="">
                               @endif                              
                            @endforeach
                            <div class="product-hover">
                                {!! Form::open(array('method' => 'post', 'route' => ['addToCart', $latest->id])) !!}
                                    <button type="submit" class="add-to-cart-link">
                                        <i class="fa fa-shopping-cart"></i> Add to cart
                                    </button>
                                {!! Form::close() !!}
                                
                                <a href="/{{ $latest->id }}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                            </div>
                        </div>
                        
                        <h2><a href="/{{ $latest->id }}">{{ $latest->name }}</a></h2>
                        
                        <div class="product-carousel-price">
                            <ins>${{ $latest->price }}</ins> <del>${{ $latest->old_price }}</del>
                        </div>                         
                    </div>

                @endforeach



            </div>
        </div>
    </div>
</div>


