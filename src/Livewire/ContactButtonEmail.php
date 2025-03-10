<?php

namespace Darvis\ModuleContact\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Env;
use Darvis\ModuleContact\Models\Contact;
use Darvis\Manta\Mail\MailContact;
use Darvis\Manta\Models\Option;

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

        $CONTACT_RECEIVERS = Option::get('CONTACT_RECEIVERS', Contact::class, App::getLocale());

        // Decode the JSON string to an array
        $receiversArray = json_decode($CONTACT_RECEIVERS, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $receiversArray[] = Env::get('MAIL_TO_ADDRESS');
            // Handle JSON decode error
            // throw new \Exception('Error decoding CONTACT_RECEIVERS JSON: ' . json_last_error_msg());
        }

        // Ensure $receiversArray is an array
        if (!is_array($receiversArray)) {
            $receiversArray[] = Env::get('MAIL_TO_ADDRESS');
            // throw new \Exception('CONTACT_RECEIVERS must be a JSON array.');
        }
        // Process each receiver
        foreach ($receiversArray as $receiver) {
            if ($receiver == "##ZENDER##" && filter_var($this->contact->email, FILTER_VALIDATE_EMAIL)) {
                Mail::to($this->contact->email)->send(new MailContact($this->contact));
            } else if (filter_var($receiver, FILTER_VALIDATE_EMAIL)) {
                Mail::to($receiver)->send(new MailContact($this->contact));
            }
        }
    }

    public function sendEmail()
    {
        $contact = Contact::find($this->contact_id);
        if (!$contact) {
            return;
        }

        $locale = App::getLocale();

        if (Env::get('MAIL_FROM_ADDRESS') == null) {
            $this->dispatchBrowserEvent('notify', ['type' => 'error', 'message' => 'Er is geen afzender e-mail ingesteld']);
            return;
        }

        if (Env::get('MAIL_FROM_NAME') == null) {
            $this->dispatchBrowserEvent('notify', ['type' => 'error', 'message' => 'Er is geen afzender naam ingesteld']);
            return;
        }

        if ($contact->email) {
            Mail::to($contact->email)->send(new MailContact($contact, $locale));
        } else {
            Mail::to(Env::get('MAIL_FROM_ADDRESS'))->send(new MailContact($contact, $locale));
        }

        $this->dispatchBrowserEvent('notify', ['type' => 'success', 'message' => 'E-mail verzonden']);
    }
}
