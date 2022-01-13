<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'name', 
        'short_name',        
        'phone', 
        'cnpj', 
        'email' 
    ];

    function Contact() {
        return $this->hasMany("App\Models\Contact");
    } 

    function Price() {
        return $this->hasMany("App\Models\Price",'cli_id');
    } 
}
