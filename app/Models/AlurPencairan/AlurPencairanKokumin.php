<?php

namespace App\Models\AlurPencairan;

use App\Models\User;
use App\Repositories\AlurPencairan\AlurNotificationHistoryRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Muhammadyunus1072\TrackHistory\HasTrackHistory;

class AlurPencairanKokumin extends Model
{
    use HasFactory, SoftDeletes, HasTrackHistory;

    protected $fillable = [
        'alur_pencairan_status_id',
        'nama',
        'status',
    ];


    const STATUS_BELUM = 'BELUM';
    const STATUS_FOLLOW_UP = 'FOLLOW UP';
    const STATUS_BAYAR = 'BAYAR';
    const STATUS_CHOICE = [
        self::STATUS_BELUM => 'BELUM',
        self::STATUS_FOLLOW_UP => 'FOLLOW UP',
        self::STATUS_BAYAR => 'BAYAR',
    ];

    protected $guarded = ['id'];
    protected static function onBoot()
    {
        self::created(function ($model) {
            $note = "Dibuat oleh: " . $model->creator->name;
            AlurNotificationHistoryRepository::create([
                'remarks_id' => $model->id,
                'remarks_type' => self::class,
                'title' => 'Kokumin ' . $model->nama,
                'note' => $note,
                'status' => AlurNotificationHistory::STATUS_CREATED
            ]);
        });
        self::updated(function ($model) {
            $title = false;
            $note = false;
            if ($model->isDirty('status')) {
                $note = 'Status Kokumin diubah: '
                    . $model->getOriginal('status')
                    . ' menjadi: '
                    . $model->status;
                $title = 'Perubahan Status Kokumin';
            }
            if ($title) {
                AlurNotificationHistoryRepository::create([
                    'remarks_id' => $model->id,
                    'remarks_type' => self::class,
                    'title' => $title,
                    'note' => $note,
                    'status' => AlurNotificationHistory::STATUS_UPDATED
                ]);
            }
        });
    }

    public function isDeletable()
    {
        return true;
    }

    public function isEditable()
    {
        return true;
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updator()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
