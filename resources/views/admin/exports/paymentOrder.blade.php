<table class="table datatable table-bordered table-striped">
    <thead class="text-primary">
    <tr>
        <th>#</th>
        <th>User Name</th>
        <th>Total Pay</th>
        <th>Payment id</th>
        <th>Currency</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($payment_orders as $index => $payment_order)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $payment_order->owner->name }}</td>
            <td>{{ $payment_order->total }}</td>
            <td>{{ $payment_order->mollie_payment_id }}</td>
            <td>{{ $payment_order->currency }}</td>
            <td>
                @if($payment_order->mollie_payment_status=='paid')
                    <span>Paid</span>
                @else
                    <span>Unpaid</span>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
