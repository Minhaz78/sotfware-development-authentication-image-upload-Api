<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $department= Department::pluck('id')->toarray();
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'address' => $this->faker->address(),
            'birth_date' =>  $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'salary' => $this->faker->numberBetween($min = 1000, $max = 20000),
            'department_id' => $this->faker->randomElement($department),
            'gender' => $this->faker->randomElement($array = array('Male','Female','Other'))
        ];
    }
}
