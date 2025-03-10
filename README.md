# Module Contact voor Laravel

Een uitbreiding voor het Manta CMS pakket waarmee je contactpersonen kunt beheren in je Laravel applicatie. Deze module maakt deel uit van het Darvis Manta CMS ecosysteem.

## Vereisten

- PHP 8.3 of hoger
- Laravel 11 of hoger
- Manta CMS pakket
- Laravel Jetstream
- Livewire 3.0
- FluxUI (indien beschikbaar in composer.json)

## Installatie

Je kunt deze package installeren via Composer:

```bash
composer require darvis/module-contact
```

De ServiceProvider wordt automatisch geregistreerd via Laravel's package auto-discovery.

## Configuratie

Na installatie kun je de configuratiebestanden publiceren met het volgende commando:

```bash
php artisan contact:publish-config
```

Of gebruik het standaard Laravel vendor:publish commando:

```bash
php artisan vendor:publish --tag=module-contact-config
```

## Views aanpassen

Als je de views wilt aanpassen, kun je deze publiceren met:

```bash
php artisan vendor:publish --tag=module-contact-views
```

## Assets publiceren

Om de assets (CSS, JavaScript, afbeeldingen) te publiceren:

```bash
php artisan vendor:publish --tag=module-contact-assets
```

## Gebruik

De module voegt routes toe onder `/cms/contact` voor het beheren van contactpersonen.

### Beschikbare routes

- `/cms/contact` - Overzicht van alle contactpersonen
- `/cms/contact/create` - Nieuwe contactpersoon toevoegen
- `/cms/contact/{id}` - Contactpersoon bekijken
- `/cms/contact/{id}/edit` - Contactpersoon bewerken
- `/cms/contact/{id}/upload` - Bestanden uploaden voor een contactpersoon
- `/cms/contact/settings` - Instellingen voor de contactmodule

### Livewire Componenten

De volgende Livewire componenten zijn beschikbaar:

- `module-contact-list` - Lijst van contactpersonen
- `module-contact-create` - Formulier voor het aanmaken van contactpersonen
- `module-contact-update` - Formulier voor het bijwerken van contactpersonen
- `module-contact-read` - Weergave van een contactpersoon
- `module-contact-upload` - Bestandsupload voor contactpersonen
- `module-contact-settings` - Instellingen voor de module
- `module-contact-list-row` - Rij in de contactenlijst
- `module-contact-button-email` - Email knop voor contactpersonen

### Functionaliteiten

De module biedt de volgende functionaliteiten:

- Beheer van contactpersonen (toevoegen, wijzigen, verwijderen)
- Ondersteuning voor meertaligheid
- Bestandsuploads voor contactpersonen
- Email functionaliteit om direct vanuit het CMS te mailen naar contactpersonen
- Aanpasbare velden via de configuratie
- Integratie met het Manta CMS voor een consistente gebruikerservaring

## Integratie met Flux UI

Deze module maakt gebruik van [Flux UI](https://fluxui.dev) voor de interface-elementen en is volledig geïntegreerd met het Manta CMS pakket. De componenten zijn ontworpen om naadloos samen te werken met de Flux UI bibliotheek.

## Aanpassen van de module

De module is ontworpen om eenvoudig uitbreidbaar te zijn. Je kunt:

- De configuratie aanpassen om velden toe te voegen of te verwijderen
- De views aanpassen voor een aangepaste weergave
- De controllers uitbreiden met extra functionaliteit
- Eigen Livewire componenten toevoegen die integreren met de module

## Licentie

Deze module is eigendom van Darvis en mag alleen worden gebruikt met toestemming van Darvis.
