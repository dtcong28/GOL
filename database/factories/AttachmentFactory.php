<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attachment>
 */
class AttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => fake()->uuid(),
            'attachable_type' => fake()->word(),
            'attachable_id' => fake()->numerify('###'),
            'file_path' => fake()->imageUrl(),
            'file_name' => fake()->word(),
            'extension' => fake()->word(),
            'mime_type' => 'application/octet-stream',
            'size' => fake()->randomNumber(5, false),
        ];
    }
}
