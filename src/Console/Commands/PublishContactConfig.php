<?php

namespace Darvis\ModuleContact\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class PublishContactConfig extends Command
{
    /**
     * De naam en handtekening van het console commando.
     *
     * @var string
     */
    protected $signature = 'contact:publish-config';

    /**
     * De beschrijving van het console commando.
     *
     * @var string
     */
    protected $description = 'Publiceert de configuratiebestanden voor de Contact module';

    /**
     * Voer het console commando uit.
     */
    public function handle()
    {
        $this->info('Contact module configuratie publiceren...');

        $configPath = config_path('module_contact.php');
        $sourcePath = __DIR__ . '/../../config/module_contact.php';

        if (File::exists($configPath)) {
            if (!$this->confirm('Het configuratiebestand bestaat al. Wil je het overschrijven?')) {
                $this->info('Publicatie geannuleerd.');
                return;
            }
        }

        File::copy($sourcePath, $configPath);
        $this->info('Configuratiebestand gepubliceerd naar: ' . $configPath);

        $this->info('Contact module configuratie is succesvol gepubliceerd!');
    }
}
