<?php

namespace Database\Factories;

use App\Models\QRCode;
use Illuminate\Database\Eloquent\Factories\Factory;

class QRCodeFactory extends Factory
{
    protected $model = QRCode::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'linkedin' => $this->faker->url(),
            'github' => $this->faker->url(),
        ];
    }
}
