<?php

namespace Darvis\ModuleContact\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\View;
use Darvis\ModuleContact\Models\Contact;
use Darvis\Manta\Traits\MantaTrait;
use Illuminate\Http\Request;

class ContactRead extends Component
{
    use MantaTrait;
    use ContactTrait;

    public function mount(Request $request, Contact $contact)
    {
        $this->item = $contact;
        $this->itemOrg = $contact;
        $this->locale = $contact->locale;

        if ($contact) {
            $this->id = $contact->id;
        }
        $this->getLocaleInfo();
        $this->getBreadcrumb('read');
        $this->getTablist();
    }


    public function render()
    {
        return View::make('manta::default.manta-default-read')->title($this->config['module_name']['single'] . ' bekijken');
    }
}
