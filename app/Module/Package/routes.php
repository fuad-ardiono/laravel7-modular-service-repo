<?php
use Illuminate\Support\Facades\Route;

Route::get('package', 'Package\PackageController@listData');
