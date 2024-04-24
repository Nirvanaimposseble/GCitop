<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = Carbon::today();
        DB::table('users')->insert([
            [
                'id' => '1',
                'nama' => 'Irfan Wardiana',
                'nik' => '230102041',
                'password' => Hash::make('password'),
                'role' => 'Service Desk',
                'telp' => '089612313',
                'posisi_id' => '1',
                'lokasi_id' => '1',
                'ip_address' => '123.123.123.123',
                'created_at' => $today,
                'updated_at' => $today
            ],
            [
                'id' => '2',
                'nama' => 'Haikal Pratama',
                'nik' => '230102042',
                'password' => Hash::make('password'),
                'role' => 'Agent',
                'telp' => '0896112312',
                'posisi_id' => '1',
                'lokasi_id' => '1',
                'ip_address' => '123.123.123.124',
                'created_at' => $today,
                'updated_at' => $today
            ],
            [
                'id' => '3',
                'nama' => 'Fauzan Zulfikri',
                'nik' => '230102043',
                'password' => Hash::make('password'),
                'role' => 'Client',
                'telp' => '089172143',
                'posisi_id' => '1',
                'lokasi_id' => '1',
                'ip_address' => '123.123.123.121',
                'created_at' => $today,
                'updated_at' => $today
            ],
        ]);

        DB::table('agents')->insert([
            [
                'id' => '1',
                'nik' => '230102042',
                'nama' => 'Haikal Pratama',
                'divisi' => 'repairement',
                'status' => 'idle',
                'created_at' => $today,
                'updated_at' => $today
            ]
        ]);
        DB::table('clients')->insert([
            [
                'id' => '1',
                'nama' => 'Fauzan Zulfikri',
                'nik' => '230102043',
                'posisi_id' => '1',
                'lokasi_id' => '1',
                'telp' => '089172143',
                'ip_address' => '123.123.123.121',
                'created_at' => $today,
                'updated_at' => $today
            ]
        ]);
    }
}
