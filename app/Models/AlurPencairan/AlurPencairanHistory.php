<?php

namespace App\Models\AlurPencairan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Muhammadyunus1072\TrackHistory\HasTrackHistory;

class AlurPencairanHistory extends Model
{
    use HasFactory, SoftDeletes, HasTrackHistory;

    protected $fillable = [

        'alur_pencairan_id',
        'alur_pencairan_alur_proses_id',
        'role_id',
        'nama_karyawan',
        'status',
        'keterangan',
    ];

    protected $guarded = ['id'];


    const STATUS_CANCEL = 'cancel';
    const STATUS_DONE = 'done';
    const STATUS_CHOICE = [
        self::STATUS_CANCEL => 'Cancel',
        self::STATUS_DONE => 'Done',
    ];

    public function isDeletable()
    {
        return true;
    }

    public function isEditable()
    {
        return true;
    }

    protected static function onBoot()
    {
        self::created(function ($model) {
            AlurPencairanStatus::updateOrCreate(
                [
                    'alur_pencairan_id' => $model->alur_pencairan_id,
                    'alur_pencairan_alur_proses_id' => $model->alur_pencairan_alur_proses_id,
                ],
                [
                    'status' => $model->status,
                    'keterangan' => $model->keterangan,
                ]
            );
        });
    }
}
