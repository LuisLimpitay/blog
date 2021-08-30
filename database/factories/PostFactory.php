<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->jobTitle();
        return [
            'title' => $title,
            //'slug' => Str::slug($title, '-'),
            'description' => $this->faker->text(100),
            'image' => 'https://i.picsum.photos/id/613/300/300.jpg?hmac=iAlBg400TaxoC7sUHVjQQVaMZ9im8E314SrksFFgfYU',
            'user_id' => User::all()->random()->id
        ];
    }
}
