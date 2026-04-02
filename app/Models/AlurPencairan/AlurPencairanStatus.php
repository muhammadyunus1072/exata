<?php

namespace App\Models\AlurPencairan;

use App\Models\User;
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

        'is_multi',
        'user_id',
        'user_name',
    ];

    const STATUS_PENDING = 'pending';
    const STATUS_DONE = 'done';
    const STATUS_CANCEL = 'cancel';

    protected $guarded = ['id'];

    public function isDeletable()
    {
        return true;
    }

    public function getProgressStatus()
    {
        switch ($this->alur_pencairan_alur_proses_id) {
            case 16:
                return true;
                break;
            case 17:
                return count($this->AlurPencairanDetailBelumMelengkapiRekeningSalah) ? false : true;
                break;
            case 18:
                return count($this->AlurPencairanDetailBelumTransferSusulan) ? false : true;
                break;

            default:
                return $this->status  == AlurPencairanStatus::STATUS_DONE ? true : false;
                break;
        }
    }

    public function isEditable()
    {
        return true;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function AlurPencairanAlurProses()
    {
        return $this->belongsTo(AlurPencairanAlurProses::class, 'alur_pencairan_alur_proses_id', 'id');
    }
    public function AlurPencairanDetail()
    {
        return $this->hasMany(AlurPencairanDetail::class, 'alur_pencairan_id', 'alur_pencairan_id');
    }
    public function AlurPencairanDetailBelumMelengkapiRekeningSalah()
    {
        return $this->hasMany(AlurPencairanDetail::class, 'alur_pencairan_id', 'alur_pencairan_id')
            ->where('rekening_terbaru', null);
    }
    public function AlurPencairanDetailBelumTransferSusulan()
    {
        return $this->hasMany(AlurPencairanDetail::class, 'alur_pencairan_id', 'alur_pencairan_id')
            ->where('tanggal_transfer', null);
    }
}
