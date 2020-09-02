<?php namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class OrangSeeder extends \CodeIgniter\Database\Seeder
{
        public function run()
        {
                $data = [
                        'nama'          => 'Nenfie Tjoeng',
                        'alamat'        => 'Jl. ABC No.10'
                        // 'created_at'    => Time::now(),
                        // 'updated_at'    => Time::now()
                ];

                // Simple Queries
                // $this->db->query("INSERT INTO orang (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)",
                //         $data
                // );

                // Using Query Builder
                $this->db->table('orang')->insert($data);
        }
}