<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types = ['front-end-dev', 'back-end-dev', 'full-stack', 'Devops'];

        foreach ($types as $typeName) {
            $type = new Type();
            $type->name = $typeName;
            $type->color = $faker->unique()->hexColor();
            $type->save();
        }
    }
}
