<?php

namespace Tests\Feature;

use App\Http\Requests\QrCodeRequest;
use App\Models\QRCode;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class QRCodeFeatureTest extends TestCase
{
    use DatabaseTransactions;

    private $qrCodeData;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->qrCodeData = [
            'name' => 'John Doe',
            'linkedin' => 'https://www.linkedin.com/in/johndoe',
            'github' => 'https://github.com/johndoe',
        ];
    }

    /**
     * Test the generator method of QRCodeController.
     *
     * @return void
     */
    public function testGenerateMethodWithValidData()
    {
        $request = new QrCodeRequest($this->qrCodeData);

        $response = $this->post(route('qrcode.generate', $request->id), $request->all());
        $response->assertStatus(200);
        $response->assertViewIs('qrcode-generate');

        $this->assertDatabaseHas('qr_codes', $this->qrCodeData);
    }

    /**
     * Test the QRCodeController read method.
     *
     * @return void
     */
    public function testReadMethodWithValidId()
    {
        $qrCode = QRCode::create($this->qrCodeData);

        $response = $this->get(route('qrcode.read', $qrCode->id));
        $response->assertStatus(200);
        $response->assertViewIs('qrcode-read');

        $response->assertSee($this->qrCodeData['name']);
        $response->assertSee($this->qrCodeData['linkedin']);
        $response->assertSee($this->qrCodeData['github']);
    }

    /**
     * Test the QRCodeController read method with an invalid ID.
     *
     * @return void
     */
    public function testReadMethodWithInvalidId()
    {
        $response = $this->get(route('qrcode.read', 'invalid_id'));
        $response->assertStatus(404);
    }

    /**
     * Test the QRCodeController read method with a non-existent ID.
     *
     * @return void
     */
    public function testReadMethodWithNonExistentId()
    {
        $response = $this->get(route('qrcode.read', 999));
        $response->assertStatus(404);
    }
}
