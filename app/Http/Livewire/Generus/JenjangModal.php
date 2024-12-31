<?php

namespace App\Http\Livewire\Generus;

use Livewire\Component;
use App\Models\Jenjang;

class JenjangModal extends Component
{
    public $nama;

    public Jenjang $jenjang;

    protected $rules = [
        'nama' => 'required|string',
    ];

    // This is the list of listeners that this component listens to.
    protected $listeners = [
        'modal.show.jenjang_name' => 'mountJenjang',
        'delete_jenjang' => 'delete'
    ];

    public function render()
    {
        return view('livewire.generus.jenjang-modal');
    }

    public function mountJenjang($jenjang_name = '')
    {
        if (empty($jenjang_name)) {
            // Create new
            $this->jenjang = new Jenjang;
            $this->nama = '';
            return;
        }

        // Get the role by name.
        $jenjang = Jenjang::where('nama', $jenjang_name)->first();
        if (is_null($jenjang)) {
            $this->emit('error', 'The selected [' . $jenjang_name . '] is not found');
            return;
        }

        $this->jenjang = $jenjang;

        $this->nama = $this->jenjang->nama;
    }

    public function submit()
    {
        $this->validate();

        $this->jenjang->nama = strtolower($this->nama);
        if ($this->jenjang->isDirty()) {
            $this->jenjang->save();
        }

        // Emit a success event with a message indicating that the permissions have been updated.
        $this->emit('success', 'Jenjang updated');
    }

    public function delete($nama)
    {
        $jenjang = Jenjang::where('nama', $nama)->first();

        if (!is_null($jenjang)) {
            $jenjang->delete();
        }

        $this->emit('success', 'Jenjang deleted');
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
