@include('struktur.navbar')

    <!-- Blog Start -->
    <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          </p>
          <h1 class="mb-4">apa carik kak?</h1>
        </div>
        <div class="row pb-3">
          <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-2">
              <img class="card-img-top mb-2" src="img/blog-1.jpg" alt="" />
              <div class="card-body bg-light text-center p-4">
                <h4 class="">Makanan</h4>
                <p>
                    Di sana, di tengah gurun lapar, makanan adalah oase penyegar, hadir dengan kuasa penuh kelezatan, menggugah selera dan memeluk kenikmatan di dalam setiap suapan, membangkitkan rasa bahagia dan menghidupkan kisah-kisah dalam ruang perut yang lapar.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-2">
              <img class="card-img-top mb-2" src="img/blog-2.jpg" alt="" />
              <div class="card-body bg-light text-center p-4">
                <h4 class="">Minuman</h4>
                <p>
                    Cairan kehidupan mengalir dalam gelas, memanggil dahaga yang tak terkatakan, menari dalam getaran rasa yang mempesona, minuman adalah roh penyegar yang menghantarkan kenikmatan melewati bibir dan ke dalam jiwa.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-2">
              <img class="card-img-top mb-2" src="img/blog-3.jpg" alt="" />
              <div class="card-body bg-light text-center p-4">
                <h4 class="">Snack</h4>
                <p>
                    Snack, si kecil penghibur jiwa, mengisi kekosongan di antara waktu, gurih dan renyah bergabung dalam harmoni, memikat hati dengan cita rasa yang menari-nari di lidah, mengajak petualangan ke dunia kenikmatan yang tak terduga.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Blog End -->

    @include('struktur.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"
      ><i class="fa fa-angle-double-up"></i
    ></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/FrontEnd/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('/FrontEnd/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/FrontEnd/lib/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('/FrontEnd/lib/lightbox/js/lightbox.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('/FrontEnd/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('/FrontEnd/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('/FrontEnd/js/main.js')}}"></script>
  </body>
</html>
