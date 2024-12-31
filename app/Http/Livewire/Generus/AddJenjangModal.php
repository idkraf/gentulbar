<?php

namespace App\Http\Livewire\Generus;

use Livewire\Component;
use App\Models\Jenjang;

class AddJenjangModal extends Component
{
    public $nama;

    public Jenjang $jenjang;

    protected $rules = [
        'nama' => 'required|string',
    ];

    
    public function render()
    {
        return view('livewire.generus.add-jenjang-modal');
    }

    public function submit()
    {
        $this->validate();
        $jenjang = Jenjang::create([
            'nama' => $this->nama,
        ]);
        // Emit a success event with a message indicating that the permissions have been updated.
        $this->emit('success', 'Jenjang berhasil ditambahkan');
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
