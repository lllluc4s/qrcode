<?php

namespace App\Http\Controllers;

use App\Http\Requests\QrCodeRequest;
use App\Models\QRCode;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCodeGenerator;

class QRCodeController extends Controller
{
    /**
     * Generate QR code image URL based on QR code model data.
     *
     * @param QRCode $qrCode The QR code model data.
     * @return string The generated QR code image URL.
     */
    private function generateQrCode(QRCode $qrCode): string
    {
        return QrCodeGenerator::format('png')
            ->size(300)
            ->generate(url('/read/' . $qrCode->id));
    }

    /**
     * Generate a new QR code based on user input, and save the generated QR code image and model data to the database.
     *
     * @param QrCodeRequest $request The user input request data.
     * @return \Illuminate\Contracts\View\View The generated QR code image and model data.
     */
    public function generate(QrCodeRequest $request)
    {
        $qrCode = QRCode::create($request->only(['name', 'linkedin', 'github']));
        $qrCodeImage = $this->generateQrCode($qrCode);

        return view('qrcode-generate', [
            'qrCode' => $qrCode,
            'qrCodeImage' => $qrCodeImage,
        ])->with('success', 'QR Code generated successfully!');
    }


    /**
     * Read a QR code based on input data and display the result.
     *
     * @param string $data The input data from the QR code.
     * @return \Illuminate\Contracts\View\View The parsed QR code data.
     */
    public function read($id)
    {
        $qrcode = QRCode::find($id);

        if (!$qrcode) {
            abort(404, 'QR Code not found!');
        }

        $name = $qrcode->name ?? '';
        $linkedin = $qrcode->linkedin ?? '';
        $github = $qrcode->github ?? '';

        return view('qrcode-read', compact('name', 'linkedin', 'github'));
    }
}
