<?php

namespace App\Http\Controllers;

use App\Models\QRCode;

class EntriesController extends Controller
{
    /**
     * Retrieve all entries from the "qrcode" table and return them in JSON format.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listEntries()
    {
        $entries = QRCode::all();

        return response()->json($entries);
    }
}
