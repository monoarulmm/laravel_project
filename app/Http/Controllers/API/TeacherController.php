<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\suggestion;


use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class TeacherController extends Controller
{

     

        // add suggestion
    public function add_suggestion(Request $request)
    {

        $request->validate([
            
                 
            'semester' => 'string|required',
            'dept' => 'string|required',
            'subject' => 'string|required',
            'image' => 'image|file|required|max:5120',

            
         ],
         
         
         [
            

            'semester.string ' => 'deptMustbe a string ',
            'semester.string ' => 'deptMustbe a string ',

            'dept.required ' => 'dept Mustbe a required ',
            'dept.required ' => 'dept Mustbe a required ',

            'subject.required ' => 'dept Mustbe a required ',
            'subject.required ' => 'dept Mustbe a required ',
          

            'image.file' => 'file must be type of file',
            'image.image' => 'file must be image',
            'image.required' => 'you must choose a file',
            'image.size' => 'max file size id 10024KB',
            
        
                   
             ]
         );
        
          $user=Auth()->user();
          $name=$user->name;
          $userid=$user->id;
        
           
            //  image file name
             $file_name = time() . Str::upper(Str::random(16)) . '.' . $request->image->extension();
            //  move the  image
             $request->image->move(public_path('storage/suggestion'), $file_name);
        
        
             $data = [
          
               'name' =>$name,
               'user_id' =>$userid,
               'semester' =>$request->semester,
               'subject' =>$request->subject,
               'dept' =>$request->dept,
               'image' =>$file_name,
            
             ];
          

         
          
          
          suggestion::create($data);
        

          return Response(['message' => 'suggestoion created successfully.'],200);
          
    }

   // delete suggestion

   public function delete_suggestion($id)
   {

       $suggestion=suggestion::find($id);


       $image_path =public_path('storage/suggestion/'.$suggestion->image);
       if(file_exists($image_path))
       {
           unlink($image_path);
       }
       
       
       $suggestion->delete();

       return Response(['message' => 'suggestoion delated successfully.'],200);
           
   }












}
