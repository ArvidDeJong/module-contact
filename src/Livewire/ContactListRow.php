<?php

namespace Darvis\ModuleContact\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\View;
use Darvis\Manta\Traits\TableRowTrait;

class ContactListRow extends Component
{
    use ContactTrait;
    use TableRowTrait;

    public function render()
    {
        return View::make('module-contact::livewire.contact-list-row');
    }
}
