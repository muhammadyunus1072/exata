<?php

namespace Database\Seeders\AlurPencairan;

use App\Models\AlurPencairan\AlurPencairanAlurProses;
use App\Repositories\AlurPencairan\AlurPencairanAlurProsesRepository;
use Illuminate\Database\Seeder;

class AlurPencairanAlurProsesSeeder extends Seeder
{
    public function run()
    {

        foreach (AlurPencairanAlurProses::ALUR_PROSESES as $key => $alur_proses) {

            $data = [
                'role_id'     => $alur_proses['role_id'],
                'name'        => $alur_proses['name'],
                'nomor_urut'  => $key + 1,
            ];

            AlurPencairanAlurProsesRepository::create($data);
        };
    }
}
