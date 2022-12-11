<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\mod_books;

class SearchDropdown extends Component
{
    use WithPagination;
    public $searchTerm;
    public function render()
    {
        return view('livewire.search-dropdown', [
            'searchs' => mod_books::where('title', 'like', '%' . $this->searchTerm . '%')->orWhere('isbn', 'like', '%' . $this->searchTerm . '%')->orWhere('author', 'like', '%' . $this->searchTerm . '%')->orWhere('description', 'like', '%' . $this->searchTerm . '%')->paginate(10)
        ]);
    }
}
