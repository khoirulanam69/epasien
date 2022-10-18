<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;

class DokterController extends Controller
{
    public function index()
    {
        $dokter = Dokter::getDokter()->get();
        $data = [
            'dokter' => $dokter
        ];
        return view('pages.dokter', $data);
    }

    public function search(Request $request)
    {
        $output = "";
        $dokter = Dokter::findDokter($request->keyword_dokter)->get();
        if ($dokter) {
            foreach ($dokter as $key => $dokter) {
                $output .= '<div class="col-md-4 mb-3">' .
                    '<div class="card">' .
                    '<img src="/images/dokter-default.png" class="card-img-top" alt="image dokter">' .
                    '<div class="card-body">' .
                    '<h5 class="card-title">' . $dokter->nm_dokter . '</h5>' .
                    '<p class="card-text">DOKTER GIGI DAN MULUT</p>' .
                    '</div>' .
                    '<ul class="list-group list-group-flush">' .
                    '<li class="list-group-item">' .
                    '<i class="bi bi-telephone-fill text-success"></i> HP/Telp. ' . $dokter->no_telp . ' <br>' .
                    '<i class="bi bi-envelope text-success"></i> No SIP. ' . $dokter->no_ijin_praktek .
                    '</li>' .
                    '</ul>' .
                    '</div>' .
                    '</div>';
            }
            return Response($output);
        }
    }
}
