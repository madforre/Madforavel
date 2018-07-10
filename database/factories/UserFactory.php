<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash; // 암호화된 password dummy data Hash 사용을 위해 추가

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make(str_random(10)), // Hash 파사드 이용하여 비밀번호 생성
        'remember_token' => str_random(10),
        'status' => 1,

        // 'password' => $faker->password,  페이커에 내장된 비밀번호 작성 기능이다. DB에서 노출된다.
        // 'activation_code' => str_random(30).time() 이미 가입된 사용자들이므로 이메일 인증코드가 필요 없다.
        // 또한 이메일 인증 후에 status가 1이 되므로 status도 1이어야 한다.
    ];
});
