<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Plantilla;
use Carbon\Carbon;

class PlantillaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 1;
        do {
            Plantilla::create([
                'position_id' => rand(1,14),
                'plantilla' => Str::random(20),
                'creationdate' => Carbon::now()->toDateString()
            ]);
            $i++;
        } while($i<=30);
    }
}
