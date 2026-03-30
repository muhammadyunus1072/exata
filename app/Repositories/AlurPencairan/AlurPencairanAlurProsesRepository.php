<?php

namespace App\Repositories\AlurPencairan;

use App\Models\AlurPencairan\AlurPencairanAlurProses;
use App\Repositories\MasterDataRepository;

class AlurPencairanAlurProsesRepository extends MasterDataRepository
{
    protected static function className(): string
    {
        return AlurPencairanAlurProses::class;
    }

    public static function allOrdered()
    {
        return AlurPencairanAlurProses::orderBy('nomor_urut', 'ASC')->get();
    }
}
