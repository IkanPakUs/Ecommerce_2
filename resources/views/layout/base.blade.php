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
                                <a href="./index.html">
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
                                                <span>3</span>
                                            </a>
                                            <div class="cart-hover">
                                                <div class="select-items">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="si-pic">
                                                                    <img src="img/select-product-1.jpg" alt="" />
                                                                </td>
                                                                <td class="si-text">
                                                                    <div class="product-selected">
                                                                        <p>$60.00 x 1</p>
                                                                        <h6>Kabino Bedside Table</h6>
                                                                    </div>
                                                                </td>
                                                                <td class="si-close">
                                                                    <i class="ti-close"></i>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="si-pic">
                                                                    <img src="img/select-product-2.jpg" alt="" />
                                                                </td>
                                                                <td class="si-text">
                                                                    <div class="product-selected">
                                                                        <p>$60.00 x 1</p>
                                                                        <h6>Kabino Bedside Table</h6>
                                                                    </div>
                                                                </td>
                                                                <td class="si-close">
                                                                    <i class="ti-close"></i>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="select-total">
                                                    <span>total:</span>
                                                    <h5>$120.00</h5>
                                                </div>
                                                <div class="select-button">
                                                    <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                                    <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <form action="{{ route('user.logout') }}" method="post">
                                            <input type="hidden" name="_method" value="DELETE">
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