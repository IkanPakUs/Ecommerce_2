@extends('layout.base')

@section('navigation')    
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{ route('index') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
@endsection

@section('content')
    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th class="p-name text-center">Product Name</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart as $item)    
                                            <tr>
                                                <td class="cart-pic first-row">
                                                    <img src="{{ $item->product->mediaUrl()->first()->media_url }}" />
                                                </td>
                                                <td class="cart-title first-row text-center">
                                                    <h5>{{ $item->product->name }}</h5>
                                                </td>
                                                <td class="p-price first-row">Rp.{{ $item->product->price }}</td>
                                                <form action="{{ route('product.cart.delete', ["cart_id" => $item->id]) }}" method="post">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                @csrf
                                                <td class="delete-item">
                                                    <button type="submit">
                                                        <i class="material-icons">
                                                        close
                                                        </i>
                                                    </button>
                                                </td>
                                                </form>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <h4 class="mb-4">
                                Informasi Pembeli:
                            </h4>
                            <div class="user-checkout">
                                <form id="user-detail" action="{{ route('product.transaction.submitted') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="transaction_code" value="{{ $transaction_code }}">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ @$user->name }}" placeholder="Enter Your Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ @$user->email }}" placeholder="Enter Your Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone-number">Phone Number</label>
                                        <input type="text" class="form-control" id="phone-number" name="phone_number" placeholder="Enter Your Phone Number" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">ID Transaction <span>{{ $transaction_code }}</span></li>
                                    <li class="subtotal mt-3">Subtotal <span>Rp.{{ $user->total_price }}</span></li>
                                    <li class="subtotal mt-3">Tax <span>10%</span></li>
                                    <li class="subtotal mt-3">Grandtotal <span>Rp.{{ $user->total_price - ($user->total_price * 10 / 100) }}</span></li>
                                    <li class="subtotal mt-3">Bank Transfer <span>BCA</span></li>
                                    <li class="subtotal mt-3">Account Number <span>2208 1996 1403</span></li>
                                    <li class="subtotal mt-3">Account Name <span>Komang Arya</span></li>
                                </ul>
                                <a href="javascript:;" onclick="$('#user-detail').submit();" class="proceed-btn">I ALREADY PAID</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    @include('layout.footer')
@endsection