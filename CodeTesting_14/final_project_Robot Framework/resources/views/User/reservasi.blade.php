@include('struktur.navbar')




<div class="container">
    <h3 class="text-center mt-3 mb-5">PESAN TEMPAT</h3>
    <div class="card p-5 mb-5">
        <form method="POST" action="{{ route('reservasi.store') }}" id="form1">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->check() ? auth()->user()->id : '' }}">
            <label for="name">Nama Lengkap</label>
            <div class="form-group">
                <input name="name" type="text" placeholder="Masukan Nama lengkap Anda" class="form-control">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <label for="tanggal">Tanggal Reservasi</label>
            <div class="form-group">
                <input type="date" class="form-control" id="tanggal" name="tanggal_event"
                    value="{{ date('Y-m-d') }}">
            </div>

            <label for="waktu">Waktu Reservasi</label>
            <div class="form-group">
                <input type="time" class="form-control" id="waktu" name="waktu_event"
                    value="{{ date('H:i') }}">
            </div>

            <label for="medsos">Media Sosial</label>
            <div class="form-group">
                <input type="text" class="form-control" id="medsos" name="medsos"
                    placeholder="Masukan akun medsos">
            </div>

            <label for="address">Alamat</label>
            <div class="form-group">
                <input type="text" class="form-control" id="address" name="address" placeholder="Masukan Alamat">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <label for="phone">No. Telephone</label>
            <div class="form-group">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="xxxxxxxxxxxx">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group">
                <label for="event">Event</label>
                <select id="event" class="form-control" name="event">
                    <option selected disabled>Pilih...</option>
                    <option value="Arisan">Arisan</option>
                    <option value="Kumpul keluarga besar">Kumpul keluarga besar</option>
                    <option value="Reunian">Reunian</option>
                    <option value="Ulang Tahun">Ulang Tahun</option>
                </select>
            </div>

            <label for="jumlah_anggota">Jumlah Anggota</label>
            <div class="form-group">
                <input type="number" class="form-control" id="jumlah_anggota" name="jumlah_anggota"
                    placeholder="Masukkan Jumlah Anggota" min="2" max="30">
            </div>

            <button type="submit" class="
            btn btn-primary">Buat Pesanan</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>

    </div>
</div>
</div>
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif


<div class="container">
    <h3 class="text-center mt-3">Daftar Pesanan Reservasi Saya</h3>
    <div class="card mt-3 p-2">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal Reservasi</th>
                    <th scope="col">Waktu Reservasi</th>
                    <th scope="col">Event</th>
                    <th scope="col">Jumlah Anggota</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservasi as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->tanggal_event }}</td>
                        <td>{{ $item->waktu_event }}</td>
                        <td>{{ $item->event }}</td>
                        <td>{{ $item->jumlah_anggota }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <form action="{{ route('delete.reservasi', ['id' => $item['id']]) }}" method="post">
                                @csrf
                                @method('delete')
                                @if ($item['status'] === 'Approved')
                                    <button type="submit" class="btn btn-danger btn-sm" disabled>Delete</button>
                                @else
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('struktur.footer')
