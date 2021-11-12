<?php

namespace Database\Factories;

use App\Models\Attendee;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $paid=rand(0,1);
        $payerID=!$paid?'':uniqid();
        
        return [
            'name'=>$this->faker->name(),
            'email'=>$this->faker->unique()->safeEmail(),
            'paid'=>$paid,
            'payerID'=>$payerID,
            'qr'=>$this->faker->imageUrl(320,320),
            'event_id'=>1
        ];
    }
    
   
}
