@extends('layout.base')

@section('navigation')    
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{ route('index') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
@endsection

@section('content')
    
    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="{{ $product->mediaUrl()->first()->media_url }}" alt="" />
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    @foreach ($product->mediaUrl as $media)
                                        <div class="pt active" data-imgbigurl="{{ $media->media_url }}">
                                            <img src="{{ $media->media_url }}" alt="" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>{{ $product->category->name }}</span>
                                    <h3>{{ $product->name }}</h3>
                                </div>
                                <div class="pd-desc">
                                    <p>
                                        {{ $product->description }}
                                    </p>
                                    <h4>Rp.{{ $product->price }}</h4>
                                </div>
                                <div class="quantity">
                                    <a href="shopping-cart.html" class="primary-btn pd-cart">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($related->count() < 1)
                    <div class="col-lg-12 col-sm-12 text-center">
                        <h2 style="font-weight: lighter; font-style: italic" >Nothing related product</h2>
                    </div>
                @else
                    @foreach ($related as $product)    
                        <div class="col-lg-3 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="{{ $product->mediaUrl()->first()->media_url }}" alt="" />
                                    <ul>
                                        <li class="w-icon active">
                                            <a href="{{ route('product.view', ['product_id' => $product->id]) }}"><i class="icon_bag_alt"></i></a>
                                        </li>
                                        <li class="quick-view"><a href="{{ route('product.view', ['product_id' => $product->id]) }}">+ Quick View</a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">{{ $product->category->name }}</div>
                                    <a href="{{ route('product.view', ['product_id' => $product->id]) }}">
                                        <h5>{{ $product->name }}</h5>
                                    </a>
                                    <div class="product-price">
                                        {{ $product->price }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- Related Products Section End -->

    @include('layout.footer')
@endsection