<?php

namespace Darvis\ModuleContact\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\View;
use Darvis\ModuleContact\Models\Contact;

use Darvis\Manta\Traits\SortableTrait;
use Darvis\Manta\Traits\MantaTrait;
use Darvis\Manta\Traits\WithSortingTrait;
use Darvis\ModuleContact\Livewire\ContactTrait;

class ContactList extends Component
{
    use ContactTrait;
    use SortableTrait;
    use MantaTrait;
    use WithSortingTrait;
    use WithPagination;

    public function mount()
    {
        $this->sortBy = 'created_at';
        $this->sortDirection = 'DESC';
        $this->getBreadcrumb();
    }

    public function render()
    {
        $obj = Contact::query();
        $items = $obj->paginate(50);
        return View::make('module-contact::livewire.contact-list', ['items' => $items])->title($this->config['module_name']['multiple']);
    }
}
