<table class="table datatable table-bordered table-striped">
    <thead class="text-primary">
    <tr>
        <th>#</th>
        <th>Full Name</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Email Address</th>
        <th>Gender</th>
        <th>Street Address</th>
        <th>House Number</th>
        <th>Extension</th>
        <th>City</th>
        <th>State</th>
        <th>Zip Code</th>
        <th>Status</th>
        {{--<th>Action</th>--}}
    </tr>
    </thead>
    <tbody>
    @foreach ($seller_list as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->user->name }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->user->email }}</td>
            <td>{{ ucfirst($item->gender) }}</td>
            <td>{{ $item->street_address }}</td>
            <td>{{ $item->house_number }}</td>
            <td>{{ $item->extension }}</td>
            <td>{{ $item->city }}</td>
            <td>{{ $item->state }}</td>
            <td>{{ $item->zip_code }}</td>
            <td>{{ $item->extension }}</td>
            <td>
                @if($item->is_certified==false)
                    <span class="badge badge-info">Pending</span>
                @else
                    <span class="badge badge-success">Approved</span>
                @endif
            </td>
            {{--<td>--}}
                {{--@if($item->is_certified==false)--}}
                    {{--<a href="{{route('admin.seller.change_status',$item->id)}}"--}}
                       {{--class="btn btn-primary btn-sm">Approve</a>--}}
                {{--@else--}}
                    {{--<a href="{{route('admin.seller.change_status',$item->id)}}"--}}
                       {{--class="btn btn-danger btn-sm">Disapprove</a>--}}
                {{--@endif--}}
            {{--</td>--}}
        </tr>
    @endforeach
    </tbody>
</table>
