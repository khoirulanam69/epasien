<?php

namespace App\Http\Controllers;

use App\Models\BookingRegistrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dokter;
use App\Models\Jadwal;
use App\Models\Patien;
use App\Models\Poliklinik;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokters = Dokter::getDokter()->paginate(3);
        $polikliniks = Poliklinik::all();
        $data = [
            'dokters' => $dokters,
            'polikliniks' => $polikliniks
        ];
        return view('index', $data);
    }

    public function search(Request $request)
    {
        $output = "";
        $schedules = Jadwal::getJadwal($request->keyword_dokter);
        if ($schedules) {
            foreach ($schedules as $key => $schedule) {
                $output .= '<tr>' .
                    '<td>' . $schedule->hari_kerja . '</td>' .
                    '<td>' . $schedule->nm_dokter . '</td>' .
                    '<td>' . $schedule->nm_poli . '</td>' .
                    '<td>' . $schedule->jam_mulai . '</td>' .
                    '<td>' . $schedule->jam_selesai . '</td>' .
                    '<td>' . $schedule->kuota . '</td>' .
                    '</tr>';
            }
            return Response($output);
        }
    }

    public function cekIsRegistered(Request $request)
    {
        $isRegister = Patien::where('no_ktp', $request->noKtp)->first();
        if (!$isRegister) {
            $message = [
                'message' => 'KTP Anda belum terdaftar di RS, Silahkan melakukan pendaftaran terlebih dahulu di RSU Pindad Turen',
                'status' => false
            ];
            return Response($message);
        }
        $message = [
            'message' => 'Data anda sudah terdaftar',
            'status' => true,
        ];
        return Response($message);
    }

    public function store(Request $request)
    {
        $noReg = DB::select("select ifnull(MAX(CONVERT(no_reg, signed)), 0) AS no_reg from reg_periksa where kd_dokter = '" . $request->dokter . "' and tgl_registrasi = '" . date('Y-m-d', strtotime($request->tgl_periksa)) . "'");
        $patien = Patien::where('no_ktp', $request->input('no_ktp'))->first();

        if ($request->dokter == '0') {
            return Redirect::back()->with('error', 'Pilih dokter terlebih dahulu');
        } else if ($request->poli == '0') {
            return Redirect::back()->with('error', 'Pilih poli tujuan');
        } else if ($request->tgl_periksa == null) {
            return Redirect::back()->with('error', 'Pilih tanggal periksa');
        } else if ($request->tgl_periksa <= date('Y-m-d')) {
            return Redirect::back()->with('error', 'Tanggal periksa minimal 1 hari sebelum periksa');
        }

        $booking = new BookingRegistrasi();
        $booking->tanggal_booking = date("Y-m-d");
        $booking->jam_booking = date("h:i:s");
        $booking->no_rkm_medis = $patien->no_rkm_medis;
        $booking->tanggal_periksa = $request->tgl_periksa;
        $booking->kd_dokter = $request->dokter;
        $booking->kd_poli = $request->poli;
        $booking->no_reg = $noReg[0]->no_reg + 1;
        $booking->kd_pj = $patien->kd_pj;
        $booking->limit_reg = 1;
        $booking->waktu_kunjungan = date('Y-m-d H:i:s', strtotime($request->tgl_periksa));
        $booking->status = "Belum";
        $booking->save();

        return Redirect::back()->with('success', 'Berhasil daftar');
    }
}
