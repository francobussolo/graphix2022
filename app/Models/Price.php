<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'name', 
        'value',        
        'trim', 
        'active',
        'client_id'
    ];

    function Client() {
        return $this->belongsTo("App\Models\Client");
    }
    
}