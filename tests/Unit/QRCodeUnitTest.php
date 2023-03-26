<?php

namespace Tests\Unit;

use App\Models\QRCode;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class QRCodeUnitTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test case for creating a new QRCode model instance.
     *
     * @return void
     */
    public function testCreateQRCode()
    {
        $qrCodeData = [
            'name' => 'John Doe',
            'linkedin' => 'https://www.linkedin.com/in/johndoe',
            'github' => 'https://github.com/johndoe',
        ];

        $qrCode = QRCode::create($qrCodeData);

        $this->assertInstanceOf(QRCode::class, $qrCode);
        $this->assertEquals($qrCodeData['name'], $qrCode->name);
        $this->assertEquals($qrCodeData['linkedin'], $qrCode->linkedin);
        $this->assertEquals($qrCodeData['github'], $qrCode->github);
    }

    /**
     * Test case for finding a QRCode model instance by its ID.
     *
     * @return void
     */
    public function testFindQRCodeById()
    {
        $qrCodeData = [
            'name' => 'John Doe',
            'linkedin' => 'https://www.linkedin.com/in/johndoe',
            'github' => 'https://github.com/johndoe',
        ];

        $qrCode = QRCode::create($qrCodeData);
        $foundQRCode = QRCode::find($qrCode->id);

        $this->assertInstanceOf(QRCode::class, $foundQRCode);
        $this->assertEquals($qrCodeData['name'], $foundQRCode->name);
        $this->assertEquals($qrCodeData['linkedin'], $foundQRCode->linkedin);
        $this->assertEquals($qrCodeData['github'], $foundQRCode->github);
    }
}
