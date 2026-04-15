<div>

    <form wire:submit.prevent="store">
        
    <div wire:loading wire:target="images, store"
     class="position-fixed top-0 start-0 w-100 h-100 
            bg-dark bg-opacity-50 
            justify-content-center align-items-center"
     style="z-index:9999;">

        <div class="bg-white p-4 rounded shadow">
            <p class="text-dark" style="font-size: 1.5rem; width: 100%; text-align: center;"> 
                <i class="text-dark animate-wand fas fa-wand-magic-sparkles text-dark"></i> &nbsp; Sedang Memproses
            </p>
        </div>
    </div>
        <div class="row">
            <div class="col-auto mb-3">
                <button type="button" wire:loading.attr="disabled" class="btn btn-info mt-3" wire:click="addAlurProses()">
                    Tambah Alur Proses
                </button>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-hover table-stripped">
                        <thead>
                            <tr>
                                <th width="100">Nomor Urut</th>
                                <th>Jabatan</th>
                                <th>Nama Alur</th>
                                <th>Semua Role</th>
                                <th>User Spesifik</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($alur_proseses as $index => $proses)
                            <tr wire:key="alur-proses-{{$proses['key']}}">
                                <td>
                                    <input
                                    type="number"
                                    wire:model.lazy="alur_proseses.{{ $index }}.nomor_urut"
                                    class="form-control"
                                    >
                                </td>
                                <td>
                                    <select class="form-select mb-2 @error('role') is-invalid @enderror" wire:model="alur_proseses.{{$index}}.role_id">
                                        <option value="">-- ISI --</option>
                                        @foreach ($roles as $id => $name)
                                            <option value="{{ $id }}" class="text-center">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input placeholder="Nama Alur Proses" type="text" wire:model="alur_proseses.{{$index}}.name" class="form-control mb-2">
                                </td>
                                <td>
                                    <div class="form-check m-2">
                                        <input class="form-check-input" type="checkbox" wire:model="alur_proseses.{{$index}}.is_multi">
                                        <label class="form-label ms-2 mb-2">
                                            Ya
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="row d-flex justify-content-between gap-0">
                                        <div class="form-check m-2 col-auto">
                                            <input class="form-check-input" type="checkbox" wire:model.live="alur_proseses.{{$index}}.by_user">
                                            <label class="form-label ms-2 mb-2">
                                                Ya
                                            </label>
                                        </div>
    
                                        <select class="form-select mb-2 @error('role') is-invalid @enderror col" wire:model="alur_proseses.{{$index}}.user_id" {{$proses['by_user'] ? 'enabled' : 'disabled'}}>
                                            <option value="">-- ISI --</option>
                                            @foreach ($users as $id => $name)
                                                <option value="{{ $id }}" class="text-center">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="col-auto" >
                                        <button type="button" wire:loading.attr="disabled" class="btn btn-danger mb-2" wire:click="removeAlurProses('{{$index}}')">
                                            <i class="ki-duotone ki-trash fs-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                            </i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <button type="submit" wire:loading.attr="disabled" class="btn btn-primary mt-3">
            Save
        </button>
        

    </form>

</div>

@push('css')
    <style>
        input[type=checkbox] {
            /* Double-sized Checkboxes */
            -ms-transform: scale(1.2);
            /* IE */
            -moz-transform: scale(1.2);
            /* FF */
            -webkit-transform: scale(1.2);
            /* Safari and Chrome */
            -o-transform: scale(1.2);
            /* Opera */
            padding: 10px;
        }
        @keyframes pulse-wand {
            0%   { transform: scale(1);   opacity: 1; }
            50%  { transform: scale(1.2); opacity: 0.7; }
            100% { transform: scale(1);   opacity: 1; }
        }

        .animate-wand {
            animation: pulse-wand 1s infinite ease-in-out;
        }
    </style>
@endpush