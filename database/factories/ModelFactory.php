<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'remember_token' => str_random(10),
        'linea_negocio' => 1,      
            'vendedor'      => 1,  
            'area_interes'  => 0,      
            'tipo_user'     => $faker->randomElement(array ('facebook','email','banco','twitter')),  
            'name'          => $faker->name,
            'last_name'     => $faker->lastName,
            'parental_name' => $faker->lastName,      
            'email'         => $faker->unique()->safeEmail,
            'password'      =>$password ?: $password = bcrypt('123456'),  
            'activated'     => true,  
            'picture'         => '/asset_admin/images/avatar.png',
            'website'       => 'http://'.$faker->domainName.'/',  
            'comentarios'   => $faker->text(300),      
            'telephone'     => $faker->phoneNumber, 
            'token'         => str_random(64),
    ];
});
