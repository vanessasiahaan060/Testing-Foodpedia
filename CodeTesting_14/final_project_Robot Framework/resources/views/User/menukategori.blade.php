@include('struktur.navbar')
<style>
    img{
        width: 150px;
        height: 170px;
        margin-bottom: 20px;
    }
    @media only screen and (max-width: 770px) {
        img{
        width: 150px;
        height: 200px;
        margin-bottom: 20px;
    }
}
    </style>
<div class="container">
    <div class="row row-cols-2 row-cols-md-3 g-3">
        @foreach ($item as $produk)
        <div class="col">
          <div class="card h-100 col-md-12">
            <div class="text-center">

                <img src="{{ asset('image/' . $produk->thumbnail) }}" class="card-img-top mt-2" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $produk->nama }}</h5>
                    <h5>{{ $produk->price }}</h5>
                    <form action="{{route('tambahpesanan',$produk->id)}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$produk->id}}" name="product_id">
                        <input type="hidden" value="{{$produk->nama}}" name="product_name">
                        <input type="hidden" value="{{$produk->price}}" name="price">
                        <button type="submit" class="btn btn-success">
                            Beli Sekarang
                            <ion-icon name="cart-outline"></ion-icon>
                        </button>
                    </form>
                </div>
            </div>
          </div>
        </div>
        @endforeach
<br><br>
      </div>
</div>
<br><br>
@include('struktur.footer')
