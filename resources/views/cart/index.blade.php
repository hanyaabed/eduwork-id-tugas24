@extends('layout')
@section('title', 'Shopping Cart')
@section('content')
    <!-- Cart Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="mb-4 text-center">Shopping Cart</h2>
            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Row 1 -->
                        <tr>
                            <td>Product 1</td>
                            <td>$20.00</td>
                            <td>
                                <input type="number" class="form-control w-50 mx-auto" value="1" min="1">
                            </td>
                            <td>$20.00</td>
                            <td><button class="btn btn-danger btn-sm">Remove</button></td>
                        </tr>
                        <!-- Example Row 2 -->
                        <tr>
                            <td>Product 2</td>
                            <td>$25.00</td>
                            <td>
                                <input type="number" class="form-control w-50 mx-auto" value="2" min="1">
                            </td>
                            <td>$50.00</td>
                            <td><button class="btn btn-danger btn-sm">Remove</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Cart Summary -->
            <div class="row">
                <div class="col-md-6 offset-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Cart Summary</h5>
                            <p class="d-flex justify-content-between">
                                <span>Subtotal:</span>
                                <strong>$70.00</strong>
                            </p>
                            <p class="d-flex justify-content-between">
                                <span>Shipping:</span>
                                <strong>$5.00</strong>
                            </p>
                            <hr>
                            <p class="d-flex justify-content-between fs-5">
                                <span>Total:</span>
                                <strong>$75.00</strong>
                            </p>
                            <a href="checkout.html" class="btn btn-primary w-100">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection