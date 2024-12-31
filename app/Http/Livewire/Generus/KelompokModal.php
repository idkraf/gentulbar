<?php

namespace App\Http\Livewire\Generus;

use Livewire\Component;
use App\Models\Kelompok;
use App\Models\Desa;

class KelompokModal extends Component
{
    public $nama;
    public $desa;

    public Kelompok $kelompok;

    protected $rules = [
        'nama' => 'required|string',
        'desa' => 'required|integer',
    ];

    // This is the list of listeners that this component listens to.
    protected $listeners = [
        'modal.show.kelompok_name' => 'mountKelompok',
        'delete_kelompok' => 'delete'
    ];

    public function render()
    {
        $desas = Desa::all();
        return view('livewire.generus.kelompok-modal', compact('desas'));
    }

    public function mountKelompok($kelompok_name = '')
    {
        if (empty($kelompok_name)) {
            // Create new
            $this->kelompok = new Kelompok;
            $this->nama = '';
            $this->desa = '';
            return;
        }

        $kelompok = Kelompok::where('nama', $kelompok_name)->first();
        if (is_null($kelompok)) {
            $this->emit('error', 'The selected [' . $kelompok_name . '] is not found');
            return;
        }

        $this->kelompok = $kelompok;

        $this->nama = $this->kelompok->nama;
        $this->desa = $this->kelompok->desa;
    }

    public function submit()
    {
        $this->validate();

        $this->kelompok->nama = strtolower($this->nama);
        $this->kelompok->desa = strtolower($this->desa);
        if ($this->kelompok->isDirty()) {
            $this->kelompok->save();
        }

        $this->emit('success', 'Kelompok updated');
    }

    public function delete($nama)
    {
        $kelompok = Kelompok::where('nama', $nama)->first();

        if (!is_null($kelompok)) {
            $kelompok->delete();
        }

        $this->emit('success', 'Kelompok deleted');
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
