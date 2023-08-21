<?php

namespace Database\Factories;

use App\Models\CurrencySetting;
use Illuminate\Database\Eloquent\Factories\Factory;

class currencySettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CurrencySetting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'country_name' => $this->faker->word,
        'country_code' => $this->faker->word,
        'country_icon' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
