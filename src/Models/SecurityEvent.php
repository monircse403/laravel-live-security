<?php

namespace monircse403\LiveSecurity\Models;

use Illuminate\Database\Eloquent\Model;

class SecurityEvent extends Model
{
    protected $fillable = ['ip', 'path', 'user_agent'];
}
