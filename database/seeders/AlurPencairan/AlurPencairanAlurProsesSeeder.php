<?php

namespace Database\Seeders\AlurPencairan;

use App\Repositories\AlurPencairan\AlurPencairanAlurProsesRepository;
use Illuminate\Database\Seeder;

class AlurPencairanAlurProsesSeeder extends Seeder
{
    public function run()
    {
        $file = storage_path('app/alur_pencairan_alur_proses.csv');

        $rows = array_map(function ($line) {
            return str_getcsv($line, ';'); // IMPORTANT: delimiter ;
        }, file($file));

        collect($rows)
            ->skip(1) // skip header row
            ->each(function ($row) {

                $data = [
                    'id'          => $row[0] ?? null,
                    'role_id'     => $row[1] ?? null,
                    'name'        => $row[2] ?? null,
                    'nomor_urut'  => $row[3] ?? null,
                ];

                AlurPencairanAlurProsesRepository::create($data);
            });
    }
}
