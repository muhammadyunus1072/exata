<?php

namespace App\Models\AlurPencairan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Muhammadyunus1072\TrackHistory\HasTrackHistory;


class AlurPencairanStatus extends Model
{
    use HasFactory, SoftDeletes, HasTrackHistory;

    protected $fillable = [
        'alur_pencairan_id',
        'alur_pencairan_alur_proses_id',
        'status',
        'keterangan',
    ];

    const STATUS_PENDING = 'pending';
    const STATUS_DONE = 'done';
    const STATUS_CANCEL = 'cancel';

    protected $guarded = ['id'];

    public function isDeletable()
    {
        return true;
    }

    public function isEditable()
    {
        return true;
    }

    public function AlurPencairanAlurProses()
    {
        return $this->belongsTo(AlurPencairanAlurProses::class, 'alur_pencairan_alur_proses_id', 'id');
    }
}
