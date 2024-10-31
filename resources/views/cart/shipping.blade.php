<x-app-layout>
    <div class="container">
        <div class="row">
            <!-- Shipping Details Form -->
            <div class="col-md-6">
                <h2>Shipping Details</h2>
                <form action="{{ route('order.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="address1">Address 1</label>
                        <input type="text" class="form-control" id="address1" name="address1" required>
                    </div>
                    <div class="form-group">
                        <label for="address2">Address 2</label>
                        <input type="text" class="form-control" id="address2" name="address2">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="state" name="state" required>
                    </div>
                    <div class="form-group">
                        <label for="zipcode">Zip Code</label>
                        <input type="text" class="form-control" id="zipcode" name="zipcode" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Order</button>
                </form>
            </div>

            <!-- Your Order Details -->
            <div class="col-md-6">
                <h2>Your Order Details</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderItems as $item)
                            <tr>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ number_format($item->total, 2) }} baht</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>Totals</strong></td>
                            <td><strong>{{ number_format($totalAmount, 2) }} baht</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
