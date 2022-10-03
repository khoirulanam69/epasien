@extends('templates.main')

@section('body')

<body>
    <div class="container">
        <h2 class="text-center py-5">Dokter</h2>
        <form>
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
        <div id="dokterTable" class="row mt-5">
            @foreach($dokter as $dokter)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="/images/dokter-default.png" class="card-img-top" alt="image dokter">
                    <div class="card-body">
                        <h5 class="card-title"> {{$dokter->nm_dokter}} </h5>
                        <p class="card-text">DOKTER GIGI DAN MULUT</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <i class="bi bi-telephone-fill text-success"></i> HP/Tel {{$dokter->no_telp}} <br>
                            <i class="bi bi-envelope text-success"></i> No SI {{$dokter->no_ijin_praktek}}
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script src="/js/dokter.js"></script>
</body>
@include('components.footer')
@endsection