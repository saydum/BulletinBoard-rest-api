<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BulletinTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_bulletin_success(): void
    {
        $name = 'Bmw m5';
        $price = 150000.54;
        $description = "BMW M5 – это высокопроизводительный спортивный седан, который стал символом мощи и роскоши в автомобильном мире.";
        $images = [
            'https://i.pinimg.com/564x/9d/b5/d3/9db5d3622e84748a4cb001c23d7ce3b0.jpg',
            'https://i.pinimg.com/564x/ae/db/61/aedb61d489055e6bf1164a2cc798cbb2.jpg',
            'https://i.pinimg.com/564x/78/26/f5/7826f5c709b13a8f34ec31538012928a.jpg',
        ];

        $response = $this->postJson(route('bulletins.store'), [
            'name' => $name,
            'price' => $price,
            'description' => $description,
            'images' => $images
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'ID'
        ]);

        $this->assertDatabaseHas('bulletins', [
            'name' => $name,
            'price' => $price,
            'description' => $description,
            'images' => json_encode($images),
        ]);
    }

    public function test_create_bulletin_validation_fails(): void
    {
        $response = $this->postJson(route('bulletins.store'), [
            'name' => 'Car',
            'price' => 50000,
            'description' => 'Nice car',
            'images' => [
                'https://i.pinimg.com/564x/1.jpg',
                'https://i.pinimg.com/564x/2.jpg',
                'https://i.pinimg.com/564x/3.jpg',
                'https://i.pinimg.com/564x/4.jpg',
            ]
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['images']);
    }
}
