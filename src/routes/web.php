<?php

use Illuminate\Support\Facades\Route;
use Darvis\ModuleContact\Livewire\ContactList;
use Darvis\ModuleContact\Livewire\ContactCreate;
use Darvis\ModuleContact\Livewire\ContactUpdate;
use Darvis\ModuleContact\Livewire\ContactRead;
use Darvis\ModuleContact\Livewire\ContactUpload;
use Darvis\ModuleContact\Livewire\ContactSettings;

// Route::middleware('auth:staff')->prefix('laravel-filemanager')->as('lfm.')->group(function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });
// php artisan vb:ai:translate

Route::group(['prefix' => 'cms', 'middleware' => ['auth:staff', 'web']], function () {

    $modules = collect(cms_config('manta')['modules']);

    $agendaModule = $modules->firstWhere("name", 'contact');
    $name = isset($agendaModule['routename']) ? $agendaModule['routename'] : 'contact';

    Route::get("/{$name}", ContactList::class)->name('contact.list');
    Route::get("/{$name}/toevoegen", ContactCreate::class)->name('contact.create');
    Route::get("/{$name}/aanpassen/{contact}", ContactUpdate::class)->name('contact.update');
    Route::get("/{$name}/lezen/{contact}", ContactRead::class)->name('contact.read');
    Route::get("/{$name}/bestanden/{contact}", ContactUpload::class)->name('contact.upload');
    Route::get("/{$name}/instellingen", ContactSettings::class)->name('contact.settings');
});
