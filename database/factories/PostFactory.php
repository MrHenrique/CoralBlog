<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $thumb = $this->faker->image('public' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'posts', 640, 480);
        $title = $this->faker->sentence(3);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'user_id' => User::pluck('id')->random(),
            'content' => $this->faker->paragraph(),
            'thumb' => str_replace('public' . DIRECTORY_SEPARATOR, '', $thumb),
        ];
    }
}
