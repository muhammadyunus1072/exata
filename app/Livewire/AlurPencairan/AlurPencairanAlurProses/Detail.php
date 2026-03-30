<?php

namespace App\Livewire\AlurPencairan\AlurPencairanAlurProses;

use App\Helpers\Alert;
use App\Models\AlurPencairan\AlurPencairan;
use App\Repositories\AlurPencairan\AlurPencairanAlurProsesRepository;
use App\Repositories\AlurPencairan\AlurPencairanDetailRepository;
use App\Repositories\AlurPencairan\AlurPencairanRepository;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Repositories\Account\RoleRepository;

class Detail extends Component
{
    use WithFileUploads;

    public $alur_proseses = [];
    public $alur_proses_removes = [];
    public $roles = [];
    public $default_role;

    public function mount()
    {

        $this->roles = RoleRepository::getIdAndNames()->toArray();
        $this->default_role = $this->roles[0];
        $alur_proses = AlurPencairanAlurProsesRepository::allOrdered();
        foreach ($alur_proses as $detail) {
            $this->alur_proseses[] = [
                'id' => $detail['id'],
                'role_id' => $detail['role_id'],
                'role_name' => $detail->role->name,
                'name' => $detail['name'],
                'nomor_urut' => $detail['nomor_urut'],
            ];
        }
    }

    public function addAlurProses()
    {
        $this->alur_proseses[] = [
            'id' => '',
            'role_id' => $this->default_role['id'],
            'role_name' => $this->default_role['name'],
            'name' => '',
            'nomor_urut' => count($this->alur_proseses) + 1,
        ];
    }

    public function removeAlurProses($index)
    {
        if ($this->alur_proseses[$index]['id']) {
            $this->alur_proses_removes[] = $this->alur_proseses[$index]['id'];
        }
        unset($this->alur_proseses[$index]);
    }

    #[On('on-dialog-confirm')]
    public function onDialogConfirm()
    {
        $this->redirectRoute('alur_pencairan_alur_proses.index');
    }

    #[On('on-dialog-cancel')]
    public function onDialogCancel()
    {
        $this->redirectRoute('alur_pencairan_alur_proses.index');
    }

    public function store()
    {
        try {
            DB::transaction(function () {
                foreach ($this->alur_proseses as $alur) {

                    $validateData = [
                        'role_id' => $alur['role_id'],
                        'role_name' => RoleRepository::find($alur['role_id'])->name,
                        'name' => $alur['name'],
                        'nomor_urut' => $alur['nomor_urut'],
                    ];
                    if ($alur['id']) {
                        $vehicle = AlurPencairanAlurProsesRepository::update($alur['id'], $validateData);
                    } else {
                        $vehicle = AlurPencairanAlurProsesRepository::create($validateData);
                    }
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
        return view('livewire.alur-pencairan.alur-pencairan-alur-proses.detail');
    }
}
