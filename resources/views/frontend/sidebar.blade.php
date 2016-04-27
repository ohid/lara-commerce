<div class="col-md-4">
    <div class="single-sidebar">
        <h2 class="sidebar-title">Search Products</h2>
        {!! Form::open(array('method' => 'get', 'route' => 'search')) !!}
            {!! Form::text('search', null, ['placeholder' => 'Search products...']) !!}
            {!! Form::submit('Search', ['class'=> 'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>

    <div class="single-sidebar">
        <h2 class="sidebar-title">Products</h2>
        @foreach($side_products as $product)

        <div class="thubmnail-recent">
            @foreach($product->photos as $key => $photo)

            @if($key === 0)
                <img  class="recent-thumb" src="/{{ $photo->paths }}" alt="">                                          
            @endif

            @endforeach
            <h2><a href="/{{$product->id}}">{{$product->name}}</a></h2>
            <div class="product-sidebar-price">
                <ins>${{$product->price}}</ins> <del>${{$product->old_price}}</del>
            </div>                             
        </div>
        @endforeach
    </div>

    <div class="single-sidebar">
        <h2 class="sidebar-title">Recent Posts</h2>
        <ul>
        @foreach($side_products as $product)
            <li><a href="{{ $product->id }}">{{ $product->name }}</a></li>
        @endforeach
        </ul>
    </div>
</div>