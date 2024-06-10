@include('struktur.navbar')

<div class="container-fluid">
    <table class="table table-light ">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($groupedOrders as $tanggal => $pesanan)
                <tr>
                    <td colspan="6"><strong>Tanggal: {{ $tanggal }}</strong></td>
                </tr>
                @php
                    $totalTanggal = 0;
                    $count = 1;
                @endphp
                @foreach ($pesanan as $item)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $item->product_nama }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>
                            @if ($item->status == 1)
                                Diterima
                            @elseif ($item->status == 2)
                                Ditolak
                            @else
                                Menunggu
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('delete.pesanan', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                @if ($item->status == 2 || $item->status == 1)
                                    <button type="submit" class="btn btn-danger btn-sm" disabled>Delete</button>
                                @else
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                    @php
                        $totalTanggal += $item->price;
                    @endphp
                @endforeach
                <tr>
                    <td colspan="2" style="text-align: right;"><strong>Total Harga Tanggal
                            {{ $tanggal }}:</strong></td>
                    <td colspan="4">{{ $totalTanggal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('struktur.footer')
