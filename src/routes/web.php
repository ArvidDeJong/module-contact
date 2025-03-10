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

    // $modules = collect(cms_config('manta')['modules']);

    // $agendaModule = $modules->firstWhere("name", 'contact');
    // if ($agendaModule && $agendaModule['active']) {
    Route::get("/contact", ContactList::class)->name('contact.list');
    Route::get("/contact/toevoegen", ContactCreate::class)->name('contact.create');
    Route::get("/contact/aanpassen/{contact}", ContactUpdate::class)->name('contact.update');
    Route::get("/contact/lezen/{contact}", ContactRead::class)->name('contact.read');
    Route::get("/contact/bestanden/{contact}", ContactUpload::class)->name('contact.upload');
    Route::get("/contact/instellingen", ContactSettings::class)->name('contact.settings');
    // }
});
