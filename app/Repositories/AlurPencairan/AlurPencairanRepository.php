<?php

namespace App\Repositories\AlurPencairan;

use App\Models\AlurPencairan\AlurPencairan;
use App\Repositories\MasterDataRepository;

class AlurPencairanRepository extends MasterDataRepository
{
    protected static function className(): string
    {
        return AlurPencairan::class;
    }

    public static function datatable()
    {
        return AlurPencairan::query();
    }
}
