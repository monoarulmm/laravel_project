<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

// composer require cviebrock/eloquent-sluggable

class department extends Model
{
    use HasFactory;
    
    protected $fillable = [
        
        'name',
        'slug',

 
        'owner',
        'image',
     


        'lab1',
        'lab2',
        'lab3',
        'lab4',
        'lab5',

        'shortdesc1',
        'shortdesc2',
        'shortdesc3',
        'shortdesc4',
        'shortdesc5',


        'teacher1',
        'teacher2',
        'teacher3',
        'teacher4',

        'description',
       

       
        
   
        ];
        

        protected $table = 'departments';

        use Sluggable;
    
        public function Sluggable():array
        {
            return[
                'slug'=>
                [
                    'source'=> 'name'
                ]
            ];
        }


}
