<?php

namespace App\Http\Controllers;

use App\Http\Requests\QrCodeRequest;
use App\Models\QRCode as ModelQRCode;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    private function generateQrCode(QrCodeRequest $request): string
    {
        $url = url('/read') . '?name=' . urlencode($request->input('name'));

        if ($request->input('linkedin')) {
            $url .= '&linkedin=' . urlencode($request->input('linkedin'));
        }
        if ($request->input('github')) {
            $url .= '&github=' . urlencode($request->input('github'));
        }

        return QrCode::format('png')->size(300)->generate($url);
    }

    private function createQrCode(QrCodeRequest $request): string
    {
        $qrCodeImage = $this->generateQrCode($request);
        return $qrCodeImage;
    }

    private function createModelQRCode(QrCodeRequest $request)
    {
        return ModelQRCode::create([
            'name' => $request->input('name'),
            'linkedin' => $request->input('linkedin'),
            'github' => $request->input('github')
        ]);
    }

    public function generate(QrCodeRequest $request)
    {
        $qrCodeImage = $this->createQrCode($request);
        $qrCode = $this->createModelQRCode($request);

        return view('qrcode-generate', [
            'qrCode' => $qrCodeImage,
            'name' => $qrCode->name,
            'linkedin' => $qrCode->linkedin,
            'github' => $qrCode->github
        ])
            ->with('success', 'QR Code generated successfully!')
            ->with('errors', $request->messages());
    }

    public function read($data)
    {
        $dataArray = explode(' ', $data);

        return view('qrcode-read', [
            'name' => $dataArray[0],
            'linkedin' => $dataArray[1],
            'github' => $dataArray[2]
        ]);
    }
}
