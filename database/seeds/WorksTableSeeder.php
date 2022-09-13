<?php

use App\Models\Work;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class WorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $workTypes = [
            'comic book',
            'graphic novel',
        ];

        for ($i=0; $i < 100; $i++) { 
            $newWork = new Work();
            $newWork->title = $faker->realText(35);
            $newWork->description = $faker->paragraph(3, true);
            $newWork->thumb = $faker->imageUrl(500, 400, 'comics');
            $newWork->price = $faker->randomFloat(2, 1, 50);
            $newWork->series = $faker->name();
            $newWork->sale_date = $faker->date();
            $newWork->type = $faker->randomElement($workTypes);

            $newWork->save();
        }
    }
}
