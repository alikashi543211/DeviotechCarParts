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
    @foreach ($scrapYardAdvertisements as $index => $scrapYardAdvertisement)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $scrapYardAdvertisement->carMake->name }}</td>
            <td>{{ $scrapYardAdvertisement->carModel->name }}</td>
            <td>{{ $scrapYardAdvertisement->carTrim->name }}</td>
            <td>
                @if($scrapYardAdvertisement->status==false)
                    <span class="badge badge-info">Pending</span>
                @else
                    <span class="badge badge-success">Approved</span>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
