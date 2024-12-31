<?php

namespace App\Http\Livewire\Generus;

use Livewire\Component;
use App\Models\Desa;

class AddDesaModal extends Component
{
    public $nama;

    public Desa $desa;

    protected $rules = [
        'nama' => 'required|string',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function render()
    {
        return view('livewire.generus.add-desa-modal');
    }


    public function submit()
    {
        $this->validate();

        Desa::create([
            'nama' => $this->nama,
        ]);
        // Emit a success event with a message indicating that the permissions have been updated.
        $this->emit('success', 'Desa updated');
    }


    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
