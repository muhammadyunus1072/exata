<?php

namespace App\Repositories\AlurPencairan;

use App\Models\AlurPencairan\AlurPencairanDetail;
use App\Repositories\MasterDataRepository;

class AlurPencairanDetailRepository extends MasterDataRepository
{
    protected static function className(): string
    {
        return AlurPencairanDetail::class;
    }

    public static function datatable()
    {
        return AlurPencairanDetail::query();
    }
}
