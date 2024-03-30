<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suggestion extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        
        'name',
        'semester',
        'subject',
        'user_id',
        'dept',
        'files',
      
        ];
        

        protected $table = 'suggestions';

        public function user()
        {
            return $this->belongsTo(User::class);
        }
        public function files()
        {
            return $this->hasMany(File::class);
        }
}
