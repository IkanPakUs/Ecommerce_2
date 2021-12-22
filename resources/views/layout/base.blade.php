@extends('layout/html')

@section('page_content')
    <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>

        <!-- Header Section Begin -->
        <header class="header-section">
            <div class="container">
                <div class="inner-header">
                    <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <div class="logo">
                                <a href="{{ route('index') }}">
                                    <h2>Sins Wear</h2>
                                </a>
                            </div>
                        </div>
                        @if (Auth::user())
                            <div class="col-lg-10 col-md-10">
                                <div class="d-flex flex-row-reverse">
                                    <ul class="nav-right">
                                        <li class="cart-icon">
                                            <a href="#">
                                                {{ Auth::user()->name }}
                                                <i class="icon_bag_alt"></i>
                                                <span>{{ Auth::user()->cart_count }}</span>
                                            </a>
                                            <div class="cart-hover">
                                                <div class="select-items">
                                                    <table>
                                                        <tbody>
                                                            @if (Auth::user()->cart->isNotEmpty())
                                                                @php
                                                                    $carts = Auth::user()->cart;
                                                                @endphp
                                                                @foreach ($carts as $cart)
                                                                    <tr>
                                                                        <td class="si-pic">
                                                                            <img src="{{ $cart->product->mediaUrl()->first()->media_url }}" alt="" />
                                                                        </td>
                                                                        <td class="si-text">
                                                                            <div class="product-selected">
                                                                                <p>{{ $cart->product->price }} x {{ $cart->quantity }} </p>
                                                                                <h6>{{ $cart->product->name }}</h6>
                                                                            </div>
                                                                        </td>
                                                                        <td class="si-close">
                                                                            <i class="ti-close"></i>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="select-total">
                                                    <span>total:</span>
                                                    <h5>{{ Auth::user()->total_price }}</h5>
                                                </div>
                                                <div class="select-button">
                                                    <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                                    <a href="{{ route('user.cart') }}" class="primary-btn checkout-btn">CHECK OUT</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <form action="{{ route('user.logout') }}" method="post">
                                            @csrf
                                                <button type="submit" class="btn btn-outline-danger">Log Out</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-10 text-right col-md-10">
                                <div class="d-flex flex-row-reverse">
                                    <a href="{{ route('user.login') }}" class="btn btn-outline-primary ml-1">Login</a>
                                    <a href="{{ route('user.register') }}" class="btn btn-outline-success">Register</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </header>
        <!-- Header End -->

        @yield('navigation')

        @yield('content')
@endsection