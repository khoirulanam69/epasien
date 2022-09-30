@extends('templates.main')

@section('body')
    <body>
        <div class="container">
            <h2 class="text-center py-5">Kamar</h2>
            <form>
                @csrf
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th class="text-end" style="width: 20%; vertical-align: middle;">Keyword</th>
                            <td style="width: 1%; vertical-align: middle;">:</td>
                            <td style="width: 60%;"><input type="text" id="keyword" class="form-control" style="width: 100%;" placeholder="Arjuna"></td>
                            <td style="width: auto;"><button class="btn btn-warning text-white fw-bold">Cari</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <table id="facilityTable" class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Tarif</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($rooms as $room)
                        <tr>
                            <td>{{$room->kd_kamar}}</td>
                            <td>{{$room->kelas}}</td>
                            <td>{{$room->trf_kamar}}</td>
                            <td>{{$room->status}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script src="/js/facility.js"></script>
    </body>
@endsection