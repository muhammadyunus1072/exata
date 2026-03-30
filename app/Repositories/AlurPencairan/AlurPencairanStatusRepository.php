<?php

namespace App\Repositories\AlurPencairan;

use App\Models\AlurPencairan\AlurPencairanStatus;
use App\Repositories\MasterDataRepository;

class AlurPencairanStatusRepository extends MasterDataRepository
{
    protected static function className(): string
    {
        return AlurPencairanStatus::class;
    }

    public static function datatable()
    {
        return AlurPencairanStatus::query();
    }

    public static function getAlurPencairan($alur_pencairan_id)
    {
        return AlurPencairanStatus::select(
            'alur_pencairan_statuses.id as id',
            'users.name as creator_name',
            'alur_pencairan_statuses.status as status',
            'alur_pencairan_statuses.updated_at as tanggal_update',
            'alur_pencairan_statuses.keterangan as keterangan',
            'alur_pencairan_alur_proses.id as alur_pencairan_alur_proses_id',
            'alur_pencairan_alur_proses.role_id as role_id',
            'alur_pencairan_alur_proses.name as name',
            'alur_pencairan_alur_proses.nomor_urut as nomor_urut',
            'roles.name as role_name',

        )
            ->where('alur_pencairan_statuses.alur_pencairan_id', $alur_pencairan_id)
            ->join('users', function ($q) {
                $q->on('users.id', '=', 'alur_pencairan_statuses.updated_by')
                    ->whereNull('users.deleted_at');
            })
            ->join('alur_pencairan_alur_proses', function ($q) {
                $q->on('alur_pencairan_alur_proses.id', '=', 'alur_pencairan_statuses.alur_pencairan_alur_proses_id')
                    ->whereNull('alur_pencairan_alur_proses.deleted_at');
            })
            ->join('roles', function ($q) {
                $q->on('roles.id', '=', 'alur_pencairan_alur_proses.role_id');
            })
            ->get();
    }
}
