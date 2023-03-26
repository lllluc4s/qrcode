<?php

namespace App\Http\Controllers;

use App\Http\Requests\QrCodeRequest;
use App\Models\QRCode as ModelQRCode;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

        if ($request->input('linkedin')) {
            $url .= '&linkedin=' . urlencode($request->input('linkedin'));
        }
        if ($request->input('github')) {
            $url .= '&github=' . urlencode($request->input('github'));
        }

        return QrCode::format('png')->size(300)->generate($url);
    }

    /**
     * Create a new QR code image based on user input.
     *
     * @param QrCodeRequest $request The user input request data.
     * @return string The created QR code image.
     */
    private function createQrCode(QrCodeRequest $request): string
    {
        $qrCodeImage = $this->generateQrCode($request);
        return $qrCodeImage;
    }

    /**
     * Create a new QR code model based on user input.
     *
     * @param QrCodeRequest $request The user input request data.
     * @return ModelQRCode The created QR code model.
     */
    private function createModelQRCode(QrCodeRequest $request)
    {
        return ModelQRCode::create([
            'name' => $request->input('name'),
            'linkedin' => $request->input('linkedin'),
            'github' => $request->input('github')
        ]);
    }

    /**
     * Generate a new QR code based on user input, and save the generated QR code image and model data to the database.
     *
     * @param QrCodeRequest $request The user input request data.
     * @return \Illuminate\Contracts\View\View The generated QR code image and model data.
     */
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
