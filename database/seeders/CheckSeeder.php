<?php

namespace Database\Seeders;

use App\Models\Check;
use Illuminate\Database\Seeder;

class CheckSeeder extends Seeder
{
    public function run(): void
    {
        $checks = [
            [
                'Ability Checks',
            ],
            [
                'type' => 'Saving Throws',
            ],
            [
                'type' => 'Skill Checks',
            ]
        ];
        foreach ($checks as $check) {
            Check::create($check);
        }
    }
}
