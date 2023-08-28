<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>QR Code</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->description }}</td>
            <td><img src="{{ $item->qr_code }}" alt="QR Code" width="100"></td>
        </tr>
        @endforeach
    </tbody>
</table>
 @foreach($names as $name)
            <tr>
                <td>{{ $name->name }}</td>
                <td>
                    @if($name->qrcode)
                        <img src="{{ asset('storage/' . $name->qrcode) }}" alt="QR Code">
                    @else
                        QR Code belum tersedia
                    @endif
                </td>
            </tr>
        @endforeach