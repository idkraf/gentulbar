<?php

namespace App\Http\Livewire\Generus;

use Livewire\Component;
use App\Models\Desa;

class DesaModal extends Component
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
    // This is the list of listeners that this component listens to.
    protected $listeners = [
        'modal.show.desa_name' => 'mountDesa',
        'delete_desa' => 'delete'
    ];

    public function render()
    {
        return view('livewire.generus.desa-modal');
    }

    public function mountDesa($desa_name = '')
    {
        if (empty($desa_name)) {
            // Create new
            $this->desa = new Desa;
            $this->nama = '';
            return;
        }

        // Get the role by name.
        $desa = Desa::where('nama', $desa_name)->first();
        if (is_null($desa)) {
            $this->emit('error', 'The selected  [' . $desa_name . '] is not found');
            return;
        }

        $this->desa = $desa;

        // Set the name and checked permissions properties to the role's values.
        $this->name = $this->desa->nama;
    }

    public function submit()
    {
        $this->validate();

        $this->desa->nama = strtolower($this->nama);
        if ($this->desa->isDirty()) {
            $this->desa->save();
        }

        // Emit a success event with a message indicating that the permissions have been updated.
        $this->emit('success', 'Desa updated');
    }

    public function delete($name)
    {
        $desa = Desa::where('nama', $name)->first();

        if (!is_null($desa)) {
            $desa->delete();
        }

        $this->emit('success', 'Desa deleted');
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
