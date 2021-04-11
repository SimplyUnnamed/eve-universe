<?php


use SimplyUnnamed\Seat\EveUniverse\Http\Controllers\EveUniverseController;

Route::group([
    'namespace' => 'SimplyUnnamed\Seat\EveUniverse\Controllers',
    'prefix'=>'eveuniverse',
    'middleware'=>['web', 'auth']],
    function(){

       Route::get('search', [EveUniverseController::class, 'search'])->name('eveuniverse.search');

       Route::get('example', [EveUniverseController::class, 'index'])->name('eveuniverse.examples');

        Route::get('/exampleform', [EveUniverseController::class, 'exampleform'])->name('eveuniverse.exampleform');
    });