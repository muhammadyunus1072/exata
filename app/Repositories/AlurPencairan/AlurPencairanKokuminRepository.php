<?php

namespace App\Repositories\AlurPencairan;

use App\Models\AlurPencairan\AlurPencairanKokumin;
use App\Repositories\MasterDataRepository;

class AlurPencairanKokuminRepository extends MasterDataRepository
{
    protected static function className(): string
    {
        return AlurPencairanKokumin::class;
    }

    public static function datatable()
    {
        return AlurPencairanKokumin::query();
    }
}
