<table class="table datatable table-bordered table-striped">
    <thead class="text-primary">
    <tr>
        <th>#</th>
        <th>Car Make</th>
        <th>Car Model</th>
        <th>Car Trim</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($carPartAdvertisements as $index => $carPartAdvertisement)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $carPartAdvertisement->carMake->name }}</td>
            <td>{{ $carPartAdvertisement->carModel->name }}</td>
            <td>{{ $carPartAdvertisement->carTrim->name }}</td>
            <td>
                @if($carPartAdvertisement->status==false)
                    <span class="badge badge-info">Pending</span>
                @else
                    <span class="badge badge-success">Approved</span>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
