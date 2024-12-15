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
    
    public $id_generus;
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
            'id_generus' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',

            'jenjang' => 'required|exists:jenjang,id',
            'kelompok' => 'required|exists:kelompok,id',
            'desa' => 'required|exists:desa,id',

            'sekolah' => 'required|integer|min:0',
            'mondok' => 'required|integer|min:0',
            'tugas' => 'required|integer|min:0',
            'kerja' => 'required|integer|min:0',
        ];
    }

    public function render()
    {   
        $jenjang = Jenjang::all();
        return view('livewire.generus.generus-modal', compact('jenjang'));
    }
    
    
    public function submit()
    {
        $this->validate();
        
        DB::transaction(function () {
            $data = [
                'id_generus' => $this->id_generus,
                'nama' => $this->nama,
                'gender' => $this->gender,
                'jenjang' => $this->jenjang,
                'kelaskbm' => $this->kelaskbm,
                'nig' => $this->nig,
                'ttl' => $this->ttl,
                'ayah' => $this->ayah,
                'ibu' => $this->ibu,
                'nohp' => $this->nohp,
                'alamat' => $this->alamat,
                'kelompok' => $this->kelompok,
                'desa' => $this->desa,
                //status
                'sekolah' => $this->sekolah,
                'mondok' => $this->mondok,
                'tugas' => $this->tugas,
                'kerja' => $this->kerja,
        
                'keterangan' => $this->keterangan
            ];
    
            Generus::updateOrCreate(
                ['id_generus' => $this->id_generus],
                $data
            );

            $this->emit('success', __('Generus updated'));
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
        
        $generus = Generus::find($id);
        
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