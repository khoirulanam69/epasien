<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;

class DokterController extends Controller
{
    public function index()
    {
        $dokter = Dokter::all();
        $data = [
            'dokter' => $dokter
        ];
        return view('pages.dokter', $data);
    }

    public function search(Request $request)
    {
        $output = "";
        $facilities = Dokter::getRoom($request->keyword_facility);
        if ($facilities) {
            foreach ($facilities as $key => $facility) {
                $output .= '<tr>' .
                    '<td>' . $facility->nm_dokter . '</td>' .
                    '<td>' . $facility->kelas . '</td>' .
                    '<td>' . $facility->trf_kamar . '</td>' .
                    '<td>' . $facility->status . '</td>' .
                    '</tr>';
            }
            return Response($output);
        }
    }
}
