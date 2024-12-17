<?php

namespace App\Http\Livewire\Generus;

use App\Models\Jenjang;
use App\Models\Desa;
use App\Models\Kelompok;
use App\Models\Generus;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class GenerusModal extends Component
{
    
    public $id_gen;
    public $nama;
    public $gender;
    public $jenjang;
    public $kelaskbm;
    public $nig;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $ayah;
    public $ibu;
    public $nohp;
    public $alamat;
    public $kelompok;
    public $desa;
    //status
    public $sekolah;
    public $mondok;
    public $tugas;
    public $kerja;

    public $keterangan;

    protected $listeners = [
        'update_generus' => 'updateGenerus',
        'delete_generus' => 'deleteGenerus'
    ];
    protected function rules()
    {
        return [
            'nama' => 'required|string|max:75',
            'gender' => 'required|string',
            'jenjang' => 'required|exists:jenjang,id',
            'kelompok' => 'required|exists:kelompok,id',
            'desa' => 'required|exists:desa,id',
            'kelaskbm' => 'nullable|string',
            'nig' => 'nullable|string',
            'tempat_lahir' => 'nullable|string',
            'tanggal_lahir' => 'nullable|string',
            'ayah' => 'nullable|string',
            'ibu' => 'nullable|string',
            'nohp' => 'nullable|string',
            'alamat' => 'nullable|string',
            'sekolah' => 'required|integer|min:0',
            'mondok' => 'required|integer|min:0',
            'tugas' => 'required|integer|min:0',
            'kerja' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
        ];
    }

    public function render()
    {   
        $jenjangs = Jenjang::all();
        $desas = Desa::all();
        $kelompoks = Kelompok::all();
        return view('livewire.generus.generus-modal', compact('jenjangs','desas','kelompoks'));
    }
    
    
    public function submit()
    {
        // dd($this->gender,);
        $this->validate();
        
        DB::transaction(function () {
            $data = [
                'nama' => $this->nama,
                'gender' => $this->gender,
                'jenjang' => $this->jenjang,
                'kelaskbm' => $this->kelaskbm,
                'nig' => $this->nig,
                'tempat_lahir' => $this->tempat_lahir,
                'tanggal_lahir' => $this->tanggal_lahir,
                'ayah' => $this->ayah,
                'ibu' => $this->ibu,
                'nohp' => $this->nohp,
                'alamat' => $this->alamat,
                'kelompok' => $this->kelompok,
                'desa' => $this->desa,
                'sekolah' => $this->sekolah,
                'mondok' => $this->mondok,
                'tugas' => $this->tugas,
                'kerja' => $this->kerja,
                'keterangan' => $this->keterangan
            ];
    
            if ($this->id_gen != null) {
                // Update existing record
                Generus::updateOrCreate(
                    ['id' => $this->id_gen],
                    $data
                );
            } else {
                // Insert new record
                Generus::create($data);
            }

            $this->emit('success', __('Generus saved successfully'));
        });
    }
    
    public function deleteGenerus($id)
    {
        $generus = Generus::where('id', $id)->first();

        if (!is_null($generus)) {
            $generus->delete();
        }

        $this->emit('success', 'Generus deleted');
    }
    public function updateGenerus($id)
    {
        dd($id);
        $generus = Generus::find($id);
        
        $this->id_gen = $id;
        $this->nama = $generus->nama;
        $this->gender = $generus->gender;
        $this->jenjang = $generus->jenjang;
        $this->kelaskbm = $generus->kelaskbm;
        $this->nig = $generus->nig;
        $this->ttl = $generus->ttl;
        $this->ayah = $generus->ayah;
        $this->ibu = $generus->ibu;
        $this->nohp = $generus->nohp;
        $this->alamat = $generus->alamat;
        $this->kelompok = $generus->kelompok;
        $this->desa = $generus->desa;
        //status
        $this->sekolah = $generus->sekolah;
        $this->mondok = $generus->mondok;
        $this->tugas = $generus->tugas;
        $this->kerja = $generus->kerja;

        $this->keterangan = $generus->keterangan;

    }
}