<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'file_name', 'suggestion_id',
    ];

    // Define the relationship with the suggestion model
    public function suggestion()
    {
        return $this->belongsTo(Suggestion::class);
    }


    
}
