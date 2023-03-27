<?php

namespace Database\Seeders;

use App\Models\QRCode;
use Illuminate\Database\Seeder;

class QRCodeSeeder extends Seeder
{
    public function run()
    {
        QRCode::factory()->create([
            'name' => 'Test User',
            'linkedin' => 'https://www.linkedin.com/in/test-user/',
            'github' => 'https://www.github.com/test-user/',
        ]);
    }
}
