<?php

namespace App\Repositories\AlurPencairan;

use App\Models\AlurPencairan\AlurPencairanHistory;
use App\Repositories\MasterDataRepository;

class AlurPencairanHistoryRepository extends MasterDataRepository
{
    protected static function className(): string
    {
        return AlurPencairanHistory::class;
    }

    public static function datatable()
    {
        return AlurPencairanHistory::query();
    }
}
