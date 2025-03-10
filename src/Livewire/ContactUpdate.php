<?php

namespace Darvis\ModuleContact\Livewire;

use Flux\Flux;
use Livewire\Component;
use Illuminate\Support\Facades\View;
use Darvis\ModuleContact\Models\Contact;
use Darvis\Manta\Traits\MantaTrait;
use Illuminate\Http\Request;

class ContactUpdate extends Component
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

        $this->fill(
            $contact->only(
                'locale',
                'company',
                'title',
                'sex',
                'firstname',
                'lastname',
                'name',
                'email',
                'phone',
                'address',
                'address_nr',
                'zipcode',
                'city',
                'country',
                'birthdate',
                'newsletters',
                'subject',
                'comment',
                'internal_contact',
                'ip',
                'comment_client',
                'comment_internal',
                'option_1',
                'option_2',
                'option_3',
                'option_4',
                'option_5',
                'option_6',
                'option_7',
                'option_8',
            ),
        );
        $this->getLocaleInfo();
        $this->getBreadcrumb('update');
        $this->getTablist();
    }

    public function render()
    {
        return View::make('manta::default.manta-default-update')->title($this->config['module_name']['single'] . ' aanpassen');
    }


    public function save()
    {
        $this->validate();

        $row = $this->only(
            'locale',
            'company',
            'title',
            'sex',
            'firstname',
            'lastname',
            'name',
            'email',
            'phone',
            'address',
            'address_nr',
            'zipcode',
            'city',
            'country',
            'birthdate',
            'newsletters',
            'subject',
            'comment',
            'internal_contact',
            'ip',
            'comment_client',
            'comment_internal',
            'option_1',
            'option_2',
            'option_3',
            'option_4',
            'option_5',
            'option_6',
            'option_7',
            'option_8',
        );
        $row['updated_by'] = auth('staff')->user()->name;
        Contact::where('id', $this->id)->update($row);

        // return redirect()->to(route($this->route_name . '.list'));
        Flux::toast('Opgeslagen', duration: 1000, variant: 'success');
    }
}
