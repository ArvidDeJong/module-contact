<?php

namespace Darvis\ModuleContact\Livewire;

use Darvis\ModuleContact\Models\Contact;
use Darvis\Manta\Traits\MantaTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Livewire\Component;

class ContactUpload extends Component
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
        $this->getBreadcrumb('upload');
        $this->getTablist();
    }

    public function render()
    {
        return View::make('manta::default.manta-default-upload')->title($this->config['module_name']['single'] . ' bestanden');
    }
}
