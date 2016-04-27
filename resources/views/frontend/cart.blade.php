@extends('frontend.app')

@section('title', 'Shopping Cart - Lara Ecommerce ')

@section('content')

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                @include('frontend.sidebar')
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($cart))
										@foreach($cart as  $item)

											<tr class="cart_item">
                                            <td class="product-remove">
                                            	{!! Form::open(array('method'=>'post', 'route' => ['removeCartItem', $item->rowid])) !!}
                                                	<button type="submit" title="Remove this item" class="remove">X</button>
                                                {!! Form::close() !!}
                                            	
                                            </td>

                                            <td class="product-thumbnail">
												
												@foreach($item->options as $option)
														<a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="{{$option}}"></a>											
												@endforeach
                                                
                                            </td>

                                            <td class="product-name">
                                                <a href="single-product.html">{{ $item->name }}</a> 
                                            </td>

                                            <td class="product-price">
                                                <span class="amount">${{ $item->price }}</span> 
                                            </td>

                                            <td class="product-quantity">
                                                {{ $item->qty }}
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="amount">${{ $item->price }}</span> 
                                            </td>
                                        </tr>
                                    	@endforeach
                                        
                                        <tr>
                                            <td class="actions" colspan="6">
                                                <a href="/shop" class="btn btn-info">Continue Shopping  </a>
                                                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" class="paypal_form">
                                                    <input type="hidden" name="cmd" value="_xclick">
                                                    <input type="hidden" name="business" value="wp.dev951@gmail.com">
                                                    <input type="hidden" name="item_name" value="Lara Commerce Shop">
                                                    <input type="hidden" name="amount" value="{{ Cart::total() }}">
                                                    <input type="hidden" name="first_name" value="John">
                                                    <input type="hidden" name="last_name" value="Doe">
                                                    <input type="hidden" name="email" value="john_doe@gmail.com">
                                                    <input type="submit" value="Checkout" name="proceed" class="btn btn-success">
                                                </form>
                                            </td>
                                        </tr>
                                    @else
                                    <tr>
                                        <td colspan="6">You have no items in shopping cart</td>
                                    </tr>
                                    @endif

                                    </tbody>
                                </table>

                            <div class="cart-collaterals">

                            <div class="cart_totals ">
                                <h2>Cart Totals</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">${{ Cart::Total() }}</span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Shipping and Handling</th>
                                            <td>Free Shipping</td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">${{ Cart::Total() }}</span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            </div>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>

@endsection