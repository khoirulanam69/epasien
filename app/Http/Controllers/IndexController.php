<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;

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
}
