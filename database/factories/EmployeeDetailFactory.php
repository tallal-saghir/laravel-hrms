<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\EmployeeDetail;
use App\Models\EmploymentType;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $contractStart = $this->faker->date('Ymd');
        $uniqueNumber = str_pad('1', 4, '0', STR_PAD_LEFT);
        return [
            'employee_id' => function () {
                return Employee::factory()->create()->id;
            },
            'emp_id' => 'TEC-' . $contractStart . $uniqueNumber,
            // 'emp_id' => null,
            'identity_number' => $this->faker->randomDigit(),
            'name' => $this->faker->name(),
            'gender' => 'L',
            'date_of_birth' => $this->faker->date(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->streetName(),
            'photo' => 'photos/profile.png',
            'cv' => 'cv.jpg',
            'last_education' => 'SMA',
            'gpa' => 4.0,
            'work_experience_in_years' => 0,
            'marital_status' => 'single',
            'employment_type_id' => function () {
                return EmploymentType::inRandomOrder()->first()->id
                    ?? EmploymentType::factory()->create()->id;
            },
            'reporting_to' => function () {
                return Employee::inRandomOrder()->first()->id
                    ?? Employee::factory()->create()->id;
            },
        ];
    }
}
