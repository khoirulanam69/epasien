<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class FacilitiesController extends Controller
{
    public function index()
    {
        $rooms = Kamar::all();
        $data = [
            'rooms' => $rooms
        ];
        return view('pages.facilities', $data);
    }

    public function search(Request $request)
    {
        $output = "";
        $facilities = Kamar::getRoom($request->keyword_facility);
        if ($facilities) {
            foreach ($facilities as $key => $facility) {
                $output .= '<tr>' .
                    '<td>' . $facility->kd_kamar . '</td>' .
                    '<td>' . $facility->kelas . '</td>' .
                    '<td>' . $facility->trf_kamar . '</td>' .
                    '<td>' . $facility->status . '</td>' .
                    '</tr>';
            }
            return Response($output);
        }
    }
}
