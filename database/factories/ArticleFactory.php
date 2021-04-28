<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(30),
            'brief' => $this->faker->text(250),
            'article' => $this->faker->text,
            'status' => Arr::random(Article::STATUSES),
            'keywords' => implode(',', $this->faker->words(3, false)),
            'created_at'=>$this->faker->dateTimeBetween('-1 year'),
            ];
    }
}

