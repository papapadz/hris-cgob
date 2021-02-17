<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class IPCRTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ipcr_types')->insertOrIgnore([
            ['type' => 'Office Performance Committment Review', 'created_at' => Carbon::now()->toDateString(), 'updated_at' => Carbon::now()->toDateString()],
            ['type' => 'Section Performance Committment Review', 'created_at' => Carbon::now()->toDateString(), 'updated_at' => Carbon::now()->toDateString()],
            ['type' => 'Individual Performance Committment Review', 'created_at' => Carbon::now()->toDateString(), 'updated_at' => Carbon::now()->toDateString()],
        ]);

        DB::table('ipcr_function_types')->insertOrIgnore([
            ['function' => 'Core Function', 'created_at' => Carbon::now()->toDateString(), 'updated_at' => Carbon::now()->toDateString()],
            ['function' => 'Support Function', 'created_at' => Carbon::now()->toDateString(), 'updated_at' => Carbon::now()->toDateString()],
        ]);
    }
}
