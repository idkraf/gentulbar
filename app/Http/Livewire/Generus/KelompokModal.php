<?php

namespace App\Http\Livewire\Generus;

use Livewire\Component;
use App\Models\Kelompok;

class KElompokModal extends Component
{
    public $nama;

    public Kelompok $kelompok;

    protected $rules = [
        'nama' => 'required|string',
    ];

    // This is the list of listeners that this component listens to.
    protected $listeners = [
        'modal.show.kelompok_name' => 'mountKelompok',
        'delete_kelompok' => 'delete'
    ];

    public function render()
    {
        return view('livewire.generus.kelompok-modal');
    }

    public function mountKelompok($kelompok_name = '')
    {
        if (empty($kelompok_name)) {
            // Create new
            $this->kelompok = new Kelompok;
            $this->nama = '';
            return;
        }

        $kelompok = Kelompok::where('nama', $kelompok_name)->first();
        if (is_null($kelompok)) {
            $this->emit('error', 'The selected [' . $kelompok_name . '] is not found');
            return;
        }

        $this->kelompok = $kelompok;

        $this->name = $this->kelompok->nama;
    }

    public function submit()
    {
        $this->validate();

        $this->kelompok->nama = strtolower($this->nama);
        if ($this->kelompok->isDirty()) {
            $this->kelompok->save();
        }

        $this->emit('success', 'Permission updated');
    }

    public function delete($name)
    {
        $kelompok = Kelompok::where('nama', $name)->first();

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
