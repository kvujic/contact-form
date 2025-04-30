<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class Modal extends Component
{

    public $contact;
    public $showModal = false;

    protected $listeners = ['openModal'];


    public function openModal($id) {
        $this->contact = Contact::with('category')->findOrFail($id);
        $this->showModal = true;
    }

    public function closeModal() {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.modal');
    }

    public function deleteContact() {
        if ($this->contact) {
            $this->contact->delete();
            $this->showModal = false;
        }
    }
}
