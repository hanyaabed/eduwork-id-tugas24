@extends('layout')
@section('title', 'My Ecommerce')
@section('content')
<style>
    .product-image-size{
        object-fit: contain;
        height: 300px;
        width: 100%;
    }
</style>

    <!-- Hero Section -->
    <header class="bg-light py-5 text-center">
        <div class="container">
            <h1 class="display-4">Welcome to MyEcommerce</h1>
            <p class="lead">Find the best products with affordable prices</p>
            <a href="#products" class="btn btn-primary btn-lg">Shop Now</a>
        </div>
    </header>

    <!-- Products Section -->
    <section id="products" class="py-5">
        <div class="container">
            <h2 class="mb-4 text-center">Our Products</h2>
            <div class="row g-4">
                @foreach ($products as $product)
                    <div class="col-md-3 col-sm-6">
                        <div class="card h-100">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top product-image-size" alt="products">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">Rp. {{ number_format($product->price, 0, ",", ".") }}</p>
                                <a href="{{ route('product.click', $product->id) }}" target="_blank" class="btn btn-success w-100">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-12">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection