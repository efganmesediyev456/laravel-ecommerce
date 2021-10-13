

<div class="row" style="margin-top: 40px;">
    <div class="col-md-8 col-md-offset-2 m-2">
    <div class="panel panel-danger">
  <!-- Default panel contents -->
  <div class="panel-heading">User Order Details</div>

  <!-- Table -->
  <div class="table-responsive">
  <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>User Name</th>
                <th>Subtotal</th>
                <th>Discount</th>
                <th>Tax</th>
                <th>Total</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Line1</th>
                <th>Line2</th>
                <th>City</th>
                <th>Province</th>
                <th>Country</th>
                <th>Zipcode</th>
                <th>Status</th>
                <th>Shipping</th>
                <th>Created at</th>
            </tr>
        </thead>
        <tbody>
                @foreach($userOrders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ auth()->user()->name }}</td>
                    <td>{{ $order->subtotal }}</td>
                    <td>{{ $order->discount }}</td>
                    <td>{{ $order->tax }}</td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->firstname }}</td>
                    <td>{{ $order->lastname }}</td>
                    <td>{{ $order->mobile }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->line1 }}</td>
                    <td>{{ $order->line2 }}</td>
                    <td>{{ $order->city }}</td>
                    <td>{{ $order->province }}</td>
                    <td>{{ $order->country }}</td>
                    <td>{{ $order->zipcode }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->is_shipping_different == 1 ? "Shipping":"" }}</td>
                    <td>{{ $order->created_at->diffForHumans() }}</td>

                </tr>
                @endforeach
        </tbody>
        <tfoot>
        <tr>
                <th>Id</th>
                <th>User Name</th>
                <th>Subtotal</th>
                <th>Discount</th>
                <th>Tax</th>
                <th>Total</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Line1</th>
                <th>Line2</th>
                <th>City</th>
                <th>Province</th>
                <th>Country</th>
                <th>Zipcode</th>
                <th>Status</th>
                <th>Shipping</th>
                <th>Created at</th>
            </tr>
        </tfoot>
  </table>
  </div>
  
</div>
    </div>
</div>