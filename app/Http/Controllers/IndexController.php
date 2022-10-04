<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Patien;
use Facade\FlareClient\Http\Response;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokters = Dokter::paginate(3);
        $data = [
            'dokters' => $dokters
        ];
        return view('index', $data);
    }

    public function search(Request $request)
    {
        $output = "";
        $schedules = Dokter::getJadwal($request->keyword_dokter);
        if ($schedules) {
            foreach ($schedules as $key => $schedule) {
                $output .= '<tr>' .
                    '<td>' . $schedule->hari_kerja . '</td>' .
                    '<td>' . $schedule->nm_dokter . '</td>' .
                    '<td>' . $schedule->jam_mulai . '</td>' .
                    '<td>' . $schedule->jam_selesai . '</td>' .
                    '<td>' . $schedule->kuota . '</td>' .
                    '</tr>';
            }
            return Response($output);
        }
    }

    public function store(Request $request)
    {
        $isRegister = Patien::where('no_ktp', $request->noKtp)->first();
        if (!$isRegister) {
            $message = [
                'title' => 'KTP Anda belum terdaftar di RS',
                'body' => 'Silahkan melakukan pendaftaran terlebih dahulu di RSU Pindad Turen',
                'footer' => '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>'
            ];
            return Response($message);
        }
        $message = [
            'title' => 'Data anda sudah terdaftar',
            'body' => 'Apakah anda ingin lanjut registrasi?',
            'footer' => '<button type="button" class="btn btn-primary">Ya</button>'
        ];
        return Response($message);
    }
}
