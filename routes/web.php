<?php

use Illuminate\Support\Facades\Route;
use monircse403\LiveSecurity\Models\SecurityEvent;

Route::get('/livesecurity/logs', function() {
    return SecurityEvent::latest()->paginate(50);
});
