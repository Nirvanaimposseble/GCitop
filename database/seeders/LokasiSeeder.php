<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = Carbon::today();
        DB::table('lokasis')->insert([
            [
                'id' => '1',
                'nama_lokasi' => 'kebon kopi',
                'wilayah' => 'bandung barat',
                'regional' => 'indonesia',
                'area' => 'industri',
                'created_at' => $today,
                'updated_at' => $today
            ]
        ]);
    }
}
