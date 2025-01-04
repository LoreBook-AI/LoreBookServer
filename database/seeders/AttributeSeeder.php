<?php
// database/seeders/AttributeSeeder.php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    public function run()
    {
        $attributes = [
            [
                'name' => 'Strength',
                'short_name' => 'STR',
                'description' => 'Measures physical power and carrying capacity'
            ],
            [
                'name' => 'Dexterity',
                'short_name' => 'DEX',
                'description' => 'Measures agility, reflexes, and balance'
            ],
            [
                'name' => 'Constitution',
                'short_name' => 'CON',
                'description' => 'Measures endurance, stamina, and health'
            ],
            [
                'name' => 'Intelligence',
                'short_name' => 'INT',
                'description' => 'Measures reasoning and memory'
            ],
            [
                'name' => 'Wisdom',
                'short_name' => 'WIS',
                'description' => 'Measures perception and insight'
            ],
            [
                'name' => 'Charisma',
                'short_name' => 'CHA',
                'description' => 'Measures force of personality and leadership'
            ],
        ];

        foreach ($attributes as $attribute) {
            Attribute::create($attribute);
        }
    }
}
