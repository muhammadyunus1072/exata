<?php

namespace App\Models\AlurPencairan;

use App\Repositories\AlurPencairan\AlurPencairanAlurProsesRepository;
use App\Repositories\AlurPencairan\AlurPencairanHistoryRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Muhammadyunus1072\TrackHistory\HasTrackHistory;

class AlurPencairan extends Model
{
    use HasFactory, SoftDeletes, HasTrackHistory;

    // Info Rek Salah (Mencatat list nama yang blm berhasil di Transfer (rek mondai dll))
    protected $fillable = [
        'judul',
        'qty_cair',
        'keterangan',
        'status',
    ];

    const ROLE_SUPER_ADMIN = 'SUPER ADMIN';
    const ROLE_SUPERVISOR = 'SUPERVISOR';
    const ROLE_PAK_NOVI = 'PAK NOVI';
    const ROLE_ACC_EXATA = 'ACC EXATA';
    const ROLE_HS = 'HS';
    const ROLE_CC = 'CC';
    const ROLE_FINANCE = 'FINANCE';
    const ROLE_SALES = 'SALES';


    // @foreach ($alur_proseses as $index_proses => $proses)
    //     <tr wire:key="alur_proseses_{{$index_proses}}">
    //         <td class="text-center my-0 py-1">
    //             {{$proses['nomor_urut']}}
    //         </td>
    //         <td class=" my-0 py-1">
    //             {{$proses['role_name']}}
    //         </td>
    //         <td class=" my-0 py-1">
    //             {{$proses['name']}}
    //         </td>
    //         <td class="text-center my-0 py-1 d-flex align-items-center justify-content-center">
    //             <div class="form-check">
    //                 <input 
    //                 {{ (Auth::user()->roles[0]->name == 
    //                  App\Models\AlurPencairan\AlurPencairan::ROLE_ALIASE
    //                  [App\Models\AlurPencairan\AlurPencairan::ROLE_ACC] ? '' : 'disabled') }}
    //                 class="form-check-input" type="checkbox" wire:model.live="alur_proseses.{{$no - 1}}.is_checked">
    //             </div>
    //         </td>
    //         <td class="text-center my-0 py-1">
    //             {{$proses['tanggal_update']}} {{$proses['creator_name']}}
    //         </td>
    //         <td class=" my-0 py-1">
    //             @if(Aut
    //             h::user()->roles[0]->name == App\Mod
    //             els\AlurPencairan\AlurPencairan::ROLE_ALIASE[App
    //             \Models\AlurPencairan\AlurPencairan::ROLE_ACC])
    //                 <input type="text" class="form
    //                     ontrol py-0" wire:model="alur_proseses.{{$index_proses}}.keterangan" placeholder="-- ISI --">
    //             @endif
    //         </td>
    //     </tr>
    // @endforeach 



    // <div class="table-responsive">
    //     <table class="table table-bordered table-hover text-nowrap w-100 h-100">
    //         <thead>
    //             <tr>
    //                 <th class="text-center">No</th>
    //                 <th class="text-center">No Input Jepang</th>
    //                 <th>Nama Lengkap</th>
    //                 <th class="text-center">Tanggal Lahir</th>
    //                 <th>Nominal Cair</th>
    //                 <th class="text-center">Aksi</th>
    //                 <th class="text-center">Tanggal</th>
    //             </tr>
    //         </thead>
    //         <tbody>
    //             @foreach ($data_transfers as $index => $data)
    //                 <tr>
    //                     <td class="text-center">
    //                         {{$loop->iteration}}
    //                     </td>
    //                     <td class="text-center">
    //                         {{$data['no_input_jepang']}}
    //                     </td>
    //                     <td>
    //                         {{$data['nama_lengkap']}}
    //                     </td>
    //                     <td class="text-center">
    //                         {{$data['tanggal_lahir']}}
    //                     </td>
    //                     <td>
    //                         {{$data['nominal_cair']}}
    //                     </td>
    //                     <td>
    //                         <div class="form-check d-flex justify-content-center">
    //                             <input {{ (Auth::user()->roles[0]->name == 'Finance' ? '' : 'disabled') }} class="form-check-input" type="checkbox" wire:model.live="data_transfers.{{$index}}.is_check">
    //                         </div>
    //                     </td>
    //                     <td class="text-center">
    //                         {{$data['tanggal_update']}} {{$data['creator_name']}}
    //                     </td>
    //                 </tr>
    //             @endforeach
    //         </tbody>
    //     </table>
    // </div>
    const ROLE_ALIASE = [
        self::ROLE_SUPER_ADMIN => 'SUPER ADMIN',
        self::ROLE_SUPERVISOR => 'SUPERVISOR',
        self::ROLE_PAK_NOVI => 'PAK NOVI',
        self::ROLE_ACC_EXATA => 'ACC EXATA',
        self::ROLE_HS => 'HS',
        self::ROLE_CC => 'CC',
        self::ROLE_FINANCE => 'FINANCE',
        self::ROLE_SALES => 'SALES',
    ];

    const STATUS_PROSES = 'proses';
    const STATUS_DONE = 'done';
    const STATUS_CHOICE = [
        self::STATUS_PROSES => 'Proses',
        self::STATUS_DONE => 'Done',
    ];

    protected $guarded = ['id'];

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
            $alur_pencairan_alur_proseses = AlurPencairanAlurProsesRepository::all();
            foreach ($alur_pencairan_alur_proseses as $alur_proses) {
                if ($alur_proses->is_multi) {

                    foreach (\Spatie\Permission\Models\Role::findById($alur_proses->role_id)->users as $index => $user) {
                        AlurPencairanHistoryRepository::create([
                            'alur_pencairan_id' => $model->id,
                            'role_id' => Auth::user()->roles[0]->id,
                            'nama_karyawan' => Auth::user()->name,
                            'status' => AlurPencairanStatus::STATUS_PENDING,
                            'alur_pencairan_alur_proses_id' => $alur_proses->id,
                            'is_multi' => true,
                            'user_id' => $user->id,
                            'user_name' => $user->name,
                        ]);
                    }
                } else {
                    AlurPencairanHistoryRepository::create([
                        'alur_pencairan_id' => $model->id,
                        'role_id' => Auth::user()->roles[0]->id,
                        'nama_karyawan' => Auth::user()->name,
                        'status' => AlurPencairanStatus::STATUS_PENDING,
                        'alur_pencairan_alur_proses_id' => $alur_proses->id,
                        'is_multi' => false,
                        'user_id' => \Spatie\Permission\Models\Role::findById($alur_proses->role_id)->users[0]->id,
                        'user_name' => \Spatie\Permission\Models\Role::findById($alur_proses->role_id)->users[0]->name,
                    ]);
                }
            }
        });
    }

    public function latestHistories()
    {
        return $this->hasMany(AlurPencairanHistory::class)
            ->ofMany([
                'created_at' => 'max',
            ], function ($query) {
                $query->groupBy('alur_pencairan_alur_proses_id');
            });
    }

    public function AlurPencairanDetails()
    {
        return $this->hasMany(AlurPencairanDetail::class, 'alur_pencairan_id', 'id');
    }

    public function AlurPencairanStatuses()
    {
        return $this->hasMany(AlurPencairanStatus::class, 'alur_pencairan_id', 'id');
    }

    public function AlurPencairanDetailOnProses()
    {
        return $this->hasMany(AlurPencairanDetail::class, 'alur_pencairan_id', 'id')
            ->where(function ($query) {
                $query->whereNull('rekening_terbaru')
                    ->orWhereNull('tanggal_transfer');
            });
    }
}
