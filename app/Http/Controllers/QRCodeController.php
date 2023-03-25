<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function generate(Request $request)
    {
        $url = url('/read/' . urlencode($request['name']));
        $qrCodeImage = QrCode::format('png')->size(300)->generate($url);

        $qrCode = QrCode::create();
        $qrCode->name = $request->input('name');
        $qrCode->linkedin = $request->input('linkedin');
        $qrCode->github = $request->input('github');
        $qrCode->save();

        return view('qrcode-generate', [
            'qrCode' => $qrCodeImage,
            'name' => $request->input('name'),
            'linkedin' => $request->input('linkedin'),
            'github' => $request->input('github')
        ]);
    }

    // public function generate(Request $request)
    // {
    //     $url = url('/read/' . urlencode($request['name']));
    //     $qrCodeImage = QrCode::format('png')->size(300)->generate($url);

    //     return view('qrcode-generate', [
    //         'qrCode' => $qrCodeImage,
    //         'name' => $request->input('name'),
    //         'linkedin' => $request->input('linkedin'),
    //         'github' => $request->input('github')
    //     ]);
    // }

    public function read($data)
    {
        $dataArray = explode(' ', $data);

        return view('qrcode-read', [
            'name' => $dataArray[0] ?? '',
            'linkedin' => $dataArray[1] ?? '',
            'github' => $dataArray[2] ?? ''
        ]);
    }
}
