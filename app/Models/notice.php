<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notice extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'name',
        'semester',
        'description',
        'user_id',
        'dept',
        'file',
      
        ];
        

        protected $table = 'notices';
}
