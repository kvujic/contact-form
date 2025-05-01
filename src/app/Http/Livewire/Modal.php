<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;
use Livewire\WithPagination;

class Modal extends Component
{

    public $keyword = '';
    public $gender = '';
    public $category_id = '';
    public $date = '';

    use WithPagination;

    public $contact;
    public $showModal = false;

    protected $listeners = ['openModal'];

    public function mount()
    {
        $this->keyword = request()->keyword;
        $this->gender = request()->gender;
        $this->category_id = request()->category_id;
        $this->date = request()->date;
    }


    public function openModal($id) {
        $this->contact = Contact::with('category')->findOrFail($id);
        $this->showModal = true;
    }

    public function closeModal() {
        $this->showModal = false;
    }

    public function deleteContact()
    {
        if ($this->contact) {
            $this->contact->delete();
            $this->resetPage(); //
            $this->showModal = false;
        }
    }


    public function render()
    {
        $query = Contact::with('category')
        ->KeywordSearch($this->keyword)
        ->when($this->gender, fn($q) => $q->where('gender', $this->gender))
        ->when($this->category_id, fn($q) => $q->where('category_id', $this->category_id))
        ->when($this->date, fn($q) => $q->whereDate('created_at', $this->date));

        return view('livewire.modal', [
            'contacts' => $query->orderBy('id', 'desc')->paginate(7)  //
        ]);
    }

   
}
