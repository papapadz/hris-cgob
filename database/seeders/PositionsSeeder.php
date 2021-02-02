<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['position' => 'Administrative Aide I' , 'sg' => 1 , 'level' => 1],
            ['position' => 'Administrative Aide II' , 'sg' => 2 , 'level' => 1],
            ['position' => 'Administrative Aide III' , 'sg' => 3 , 'level' => 1],
            ['position' => 'Administrative Aide IV' , 'sg' => 4 , 'level' => 1],
            ['position' => 'Administrative Aide V' , 'sg' => 5 , 'level' => 1],
            ['position' => 'Administrative Aide VI' , 'sg' => 6 , 'level' => 1],
            ['position' => 'Administrative Assistant I' , 'sg' => 7 , 'level' => 1],
            ['position' => 'Administrative Assistant II' , 'sg' => 8 , 'level' => 1],
            ['position' => 'Administrative Assistant III' , 'sg' => 9 , 'level' => 1],
            ['position' => 'Administrative Officer I' , 'sg' => 10 , 'level' => 2],
            ['position' => 'Administrative Officer II' , 'sg' => 11 , 'level' => 2],
            ['position' => 'Administrative Officer III' , 'sg' => 14 , 'level' => 2],
            ['position' => 'Administrative Officer IV' , 'sg' => 14 , 'level' => 15],
            ['position' => 'Administrative Officer V' , 'sg' => 18 , 'level' => 2],
        );

        foreach($data as $d) {
            Position::create([
                'position' => $d['position'],
                'sg' => $d['sg'],
                'level' => $d['level']
            ]);
        }
    }
}
