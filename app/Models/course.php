<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class course extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'name',
        'slug',
        

        'image',
     


        'project',
        'batch',
        'duration',
        'stu_sit',


       

        'description',

   
        ];
        

        protected $table = 'courses';

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
