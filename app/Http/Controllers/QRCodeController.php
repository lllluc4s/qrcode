<?php

namespace App\Http\Controllers;

use App\Http\Requests\QrCodeRequest;
use App\Models\QRCode;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCodeGenerator;

class QRCodeController extends Controller
{
    /**
     * Generate QR code image URL based on user input.
     *
     * @param QrCodeRequest $request The user input request data.
     * @return string The generated QR code image URL.
     */
    private function generateQrCode(QrCodeRequest $request): string
    {
        $url = url('/read') . '?name=' . urlencode($request->input('name'));

        foreach (['linkedin', 'github'] as $field) {
            if ($request->input($field)) {
                $url .= '&' . $field . '=' . urlencode($request->input($field));
            }
        }

        return QrCodeGenerator::format('png')->size(300)->generate($url);
    }

    /**
     * Generate a new QR code based on user input, and save the generated QR code image and model data to the database.
     *
     * @param QrCodeRequest $request The user input request data.
     * @return \Illuminate\Contracts\View\View The generated QR code image and model data.
     */
    public function generate(QrCodeRequest $request)
    {
        $qrCodeImage = $this->generateQrCode($request);
        $qrCode = QRCode::create($request->only(['name', 'linkedin', 'github']));

        return view('qrcode-generate', [
            'qrCode' => $qrCodeImage,
            'name' => $qrCode->name,
            'linkedin' => $qrCode->linkedin,
            'github' => $qrCode->github
        ])->with('success', 'QR Code generated successfully!');
    }

    /**
     * Read a QR code based on input data and display the result.
     *
     * @param string $data The input data from the QR code.
     * @return \Illuminate\Contracts\View\View The parsed QR code data.
     */
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
