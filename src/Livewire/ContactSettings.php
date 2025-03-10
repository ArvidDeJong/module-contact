<?php

namespace Darvis\ModuleContact\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\View;
use Darvis\Manta\Traits\MantaTrait;
use Illuminate\Http\Request;
use Darvis\Manta\Models\Option;

class ContactSettings extends Component
{
    use MantaTrait;
    use ContactTrait;

    public array $settingsArr = [];
    public array $settings = [];
    public array $emailcodes = [];

    public function mount(Request $request)
    {
        $this->locale = getLocaleManta();
        if ($request->input('locale')) {
            $this->locale = $request->input('locale');
        }

        $this->getSettings();
        $this->getBreadcrumb('settings');
        $this->getTablistSettings();
        $this->settings = $this->config['settings'];
        // dd($this->settings);
    }

    public function render()
    {
        return View::make('manta::default.manta-default-settings')->title('Instellingen');
    }
}
