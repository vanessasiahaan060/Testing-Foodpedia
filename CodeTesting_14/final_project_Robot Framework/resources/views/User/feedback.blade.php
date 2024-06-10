@include('struktur.navbar')

<h3 style="text-align: center;">"Berikanlah saran sebenar-benarnya,<br> agar kami bisa meningkatkan pelayanan kami."</h3>

<div class="container-fluid">
    <div class="bg- rounded p-3 text-center">
        <form action="{{ route('komentar') }}" method="POST">
            @csrf
            <div class="mb-3 text-center">
                <label for="email" class="form-label text-white">Email</label>
                <center>
                <input type="email" name="email" id="email" class="form-control" style="width: 50em;">
                </center>
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3 text-center">
                <label for="message" class="form-label text-white">Pesan</label>
                <center>

                    <textarea name="pesan" id="message" class="form-control " rows="10" cols="30"  style="width: 50em;"></textarea>
                </center>
            </div>
            @error('pesan')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @guest
                <button type="submit" class="btn btn-light"
                    onclick="event.preventDefault(); location.href='/login';">
                    Kirim Feedback
                </button>
            @else
                <button type="submit" class="btn btn-light">Kirim Feedback</button>
            @endguest
        </form>

        <div class="mt-4">
            <h3>Komentar</h3>
            @foreach ($komentar as $comment)
            <center>

                <div class="card" style="width: 50em; max-width:100%;">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: left;">{{ $comment->email }}</h5>
                        <p class="card-text" style="text-align: left;">{{ $comment->pesan }}</p>
                    </div>
                </div>
            </center>
                @endforeach
        </div>
    </div>
</div>
@include('struktur.footer')
