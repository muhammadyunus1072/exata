<?php

namespace App\Livewire\AlurPencairan\AlurPencairan;

use App\Helpers\Alert;
use App\Models\AlurPencairan\AlurPencairan;
use App\Models\AlurPencairan\AlurPencairanDetail;
use App\Repositories\AlurPencairan\AlurPencairanDetailRepository;
use App\Repositories\AlurPencairan\AlurPencairanRepository;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Detail extends Component
{
    use WithFileUploads;

    public $objId;

    public $judul;
    public $qty_cair;
    public $keterangan;
    public $status;

    public function mount() {}

    #[On('on-dialog-confirm')]
    public function onDialogConfirm()
    {
        if ($this->objId) {
            $this->redirectRoute('alur_pencairan.edit', $this->objId);
        } else {
            $this->redirectRoute('alur_pencairan.create');
        }
    }

    #[On('on-dialog-cancel')]
    public function onDialogCancel()
    {
        $this->redirectRoute('alur_pencairan.index');
    }

    public function store()
    {
        try {
            DB::transaction(function () {
                $alur_pencairan_id = null;
                if ($this->objId) {
                    // Vehicle
                    $validateData = [
                        'judul' => $this->judul,
                        'qty_cair' => $this->qty_cair,
                        'keterangan' => $this->keterangan,
                        'status' => $this->status,
                    ];
                    $alur_pencairan_id = Crypt::decrypt($this->objId);
                    AlurPencairanRepository::update($alur_pencairan_id, $validateData);
                } else {
                    // Vehicle
                    $validateData = [
                        'judul' => $this->judul,
                        'qty_cair' => $this->qty_cair,
                        'keterangan' => $this->keterangan,
                        'status' => AlurPencairan::STATUS_PROSES,
                    ];
                    $alur_pencairan = AlurPencairanRepository::create($validateData);
                    $alur_pencairan_id = $alur_pencairan->id;
                }
            });


            DB::commit();
            Alert::confirmation(
                $this,
                Alert::ICON_SUCCESS,
                "Berhasil",
                "Data Berhasil Diperbarui",
                "on-dialog-confirm",
                "on-dialog-cancel",
                "Oke",
                "Tutup",
            );
        } catch (Exception $e) {
            DB::rollBack();
            Alert::fail($this, "Gagal", $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.alur-pencairan.alur-pencairan.detail');
    }
}
