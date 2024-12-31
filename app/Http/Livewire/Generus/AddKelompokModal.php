<?php

namespace App\Http\Livewire\Generus;

use Livewire\Component;
use App\Models\Kelompok;
use App\Models\Desa;

class AddKelompokModal extends Component
{
    public $nama;
    public $desa;

    public Kelompok $kelompok;

    protected $rules = [
        'nama' => 'required|string',
        'desa' => 'required|integer',
    ];

    public function render()
    {
        $desas = Desa::all();
        return view('livewire.generus.add-kelompok-modal', compact('desas'));
    }


    public function submit()
    {
        $this->validate();

        Kelompok::create([
            'nama' => $this->nama,
            'desa' => $this->desa,
        ]);

        $this->emit('success', 'Kelompok updated');
    }


    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
