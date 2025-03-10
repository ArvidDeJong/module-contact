<?php

namespace Darvis\ModuleContact\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\View;
use Darvis\ModuleContact\Models\Contact;

class ContactButtonEmail extends Component
{
    public ?Contact $contact = null;

    public bool $send = false;

    public function render()
    {
        return View::make('module-contact::livewire.contact-button-email');
    }

    public function save()
    {
        $this->send = false;

        $this->contact->sendmail();
    }
}
