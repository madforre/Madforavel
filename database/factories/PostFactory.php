<?php

use Faker\Generator as Faker;
use App\User; // 외래키 참조를 위한 유저모델 가져오기

$factory->define(App\Post::class, function (Faker $faker) {

    $userIds = User::all()->pluck('id')->toArray(); 

    return [
        'title' => $faker->country,
        'body' => $faker->paragraph(20),
        'user_id' => $faker->randomElement($userIds),
        'cover_image' => 'bg'.$faker->numberBetween(0,23).'.jpg', 
        // 이미 저장되어있는 bg0부터 bg21까지 jpg 파일 Post에 seeding하기
    ];
});

