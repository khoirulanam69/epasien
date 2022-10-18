@extends('templates.main')

@include('components.header')
@section('body')

<body class="mt-5 pt-5">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item position-relative active" style="--data-url: url('/images/slider1.jpg');">
                <div class="background-slider position-absolute top-0"></div>
                <div class="carousel-caption d-md-block">
                    <p class="text-white">MARI BUAT HIDUPMU LEBIH BAHAGIA</p>
                    <h1 class="text-white">Hidup Sehat</h1>
                    <button class="btn btn-success mt-3">Hubungi Dokter Kami</button>
                </div>
            </div>
            <div class="carousel-item position-relative" style="--data-url: url('/images/slider2.jpg');">
                <div class="background-slider position-absolute top-0"></div>
                <div class="carousel-caption d-md-block">
                    <p class="text-white">KAMI USAHAKAN YANG TERBAIK UNTUK ANDA</p>
                    <h1 class="text-white">Jadikan Kami Sahabat Anda</h1>
                    <button class="btn btn-secondary mt-3">Lebih Banyak Tentang Kami</button>
                </div>
            </div>
            <div class="carousel-item position-relative" style="--data-url: url('/images/slider3.jpg');">
                <div class="background-slider position-absolute top-0"></div>
                <div class="carousel-caption d-md-block">
                    <p class="text-white">JANGAN SAMPAI WAKTU ANDA DENGAN KELUARGA SAMPAI TERGANGGU</p>
                    <h1 class="text-white">Manfaatkan Kesehatan Anda</h1>
                    <button class="btn btn-primary mt-3">Lihat Jadwal Dokter</button>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Selamat datang di Pusat Kesehatan Anda</h2>
                    <p>RSU PINDAD merupakan salah satu rumah sakit umum di wilayah MALANG yang berkedudukan di PT PMU JL. JEND. GATOT SUBROTO NO.517 BDG-JL. SEMERU NO.1 TUREN. RSU PINDAD merupakan perkembangan dari balai pengobatan, klinik dan berada dibawah YASKI. RSU PINDAD mendapat izin operasional dengan Kode PPK 3507117 sejak bulan November 2009 dan diresmikan tanggal 21 februari 2010. RSU PINDAD dalam memberikan pelayanannya mengambil filosofi dasar bahwa pelayanan kesehatan yang baik itu tidak harus mahal dan kalau bisa, harus tidak mahal. Filosofi dasar yang kedua adalah bersama yang tidak mampu kita harus maju. Hal ini memiliki arti bahwa RSU PINDAD harus mampu memajukan dirinya dan pihak-pihak yang berhubungan dengan dirinya menuju arah yang lebih baik.</p>
                    <figure class="d-flex">
                        <img src="/images/author-image.jpg" class="img-thumbnail me-3" alt="image directure" style="width: 80px; height: 80px;">
                        <figcaption>
                            <h3>dr. Andre Setyawan C N</h3>
                            <p>Direktur Utama</p>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <div id="dokter" class="dokter">
        <div class="container py-5">
            <h2 class="text-center">Dokter Kami</h2>
            <div class="row mt-5">
                @foreach ($dokters as $dokter)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="/images/dokter-default.png" class="card-img-top" alt="image dokter">
                        <div class="card-body">
                            <h5 class="card-title">{{$dokter->nm_dokter}}</h5>
                            <p class="card-text">{{$dokter->nm_sps}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <i class="bi bi-telephone-fill text-success"></i> HP/Telp. {{$dokter->no_telp}} <br>
                                <i class="bi bi-envelope text-success"></i> No SIP. {{$dokter->no_ijin_praktek}}
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
                <a class="d-flex justify-content-center" href="/dokter"><button class="btn btn-primary">Lebih Banyak</button></a>
            </div>
        </div>
    </div>

    <div id="schedule" class="schedule" style="background: #eee;">
        <div class="container py-5">
            <h2 class="text-center">Jadwal Praktek Dokter</h2>
            <form class="mt-5">
                @csrf
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th class="text-end" style="width: 20%; vertical-align: middle;">Cari</th>
                            <td style="width: 1%; vertical-align: middle;">:</td>
                            <td style="width: 60%;"><input type="text" id="keyword" class="form-control" style="width: 100%;" placeholder="Nama Dokter"></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <table id="scheduleTable" class="table mt-5 text-center"></table>
        </div>
    </div>

    <div id="booking" class="booking">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="/images/appointment-image.jpg" style="width: 100%;" alt="image appointment">
                </div>
                <div class="col-md-6">
                    <h2 class="text-center mb-5">Booking Periksa</h2>
                    @if (\Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {!! \Session::get('error') !!}
                    </div>
                    @elseif (\Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {!! \Session::get('success') !!}
                    </div>
                    @endif
                    <form action="/send" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="ktp" class="form-label">Nomor KTP</label>
                            <input type="number" id="ktp" name="no_ktp" class="form-control">
                            <small id="errMessage" class="text-danger"></small>
                        </div>
                        <div id="formHidden" style="display: none;">
                            <div class="mb-3">
                                <label for="ktp" class="form-label">Poliklinik</label>
                                <select class="form-select" name="poli" aria-label="Default select example">
                                    <option selected value="0">Pilih Poli Tujuan</option>
                                    @foreach($polikliniks as $index => $poliklinik)
                                    <option value="{{$poliklinik->kd_poli}}">{{$poliklinik->nm_poli}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ktp" class="form-label">Dokter</label>
                                <select class="form-select" name="dokter" aria-label="Default select example">
                                    <option selected value="0">Pilih Dokter</option>
                                    @foreach($dokters as $index => $dokter)
                                    <option value="{{$dokter->kd_dokter}}">{{$dokter->nm_dokter}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ktp" class="form-label">Tanggal Periksa</label>
                                <input id="booking-date" class="form-control" name="tgl_periksa" type="date" value="{{date('Y-m-d', strtotime('+1 days'))}}" />
                            </div>
                        </div>
                        <button type="button" id="btnCek" class="btn btn-success mt-4 p-2" style="width: 100%;" disabled>Cek</button>
                        <div id="btnSubmit"></div>
                    </form>
                    <small>Note : Periksa jadwal praktek terlebih dahulu</small>
                </div>
            </div>
        </div>
    </div>

    <div class="maps">
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=rsu%20pindad%20turen&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="/js/schedule.js"></script>
    <script src="/js/booking.js"></script>
</body>
@include('components.footer')
@endsection