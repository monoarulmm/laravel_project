<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\department;
use App\Models\suggestion;
use App\Models\notice;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {
        $departments=department::all();


        $suggestions=suggestion::all();
        $notices=notice::all();


        $user=Auth::user();
        $userid=$user->id;

        $notices =notice::Where('user_id','=',$userid)->get();
        $suggestions =suggestion::Where('user_id','=',$userid)->get();



        return view('content.teacher.dashboard',compact('departments','suggestions','notices'));
    }

    public function teacherhome()
    {
        return view('content.teacher.teachinfo');
    }

   



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
        


          return redirect()->back()->with('message', 'Your message here');
    }


    
    public function delete_suggestion($id)
    {

        $suggestion=suggestion::find($id);


        $image_path =public_path('storage/suggestion/'.$suggestion->image);
        if(file_exists($image_path))
        {
            unlink($image_path);
        }
        
        
        $suggestion->delete();

        return redirect()->back()->with('message','suggestion deleted successfully');
            
    }
       

//     public function update_suggestion($id)
//     {


       
//     $suggestion=suggestion::find($id);

//         return view('content.admin.pages.store.store_update', compact('suggestion'));
            
//         }
        
        

//         public function update_suggestion_confirm(Request $request,  $id)
//         {


//         $request->validate([
        
             
//         'bio' => 'string|required',
       

        
//      ],
     
     
//      [
        
//         'bio.string ' => 'bio Mustbe a string ',
//         'bio.required ' => 'bio Mustbe a required ',
        
      
        
    
               
//          ]
//      );  
     
 
  
   

   
   
 

//    $data = [
//     'bio' =>$request->bio,
//    ];





//     suggestion::findOrFail($id)->update($data);


                  
//  return redirect()->back()->with('message','suggestion updated successfully');
  
          
// }

  

public function add_notice(Request $request)
{

    $request->validate([
        
             
        'semester' => 'string|required',
        'dept' => 'string|required',
        'description' => 'string|required',
        'image' => 'image|file|required|max:5120',

        
     ],
     
     
     [
        

        'semester.string ' => 'semester Mustbe a string ',
        'semester.string ' => 'semester Mustbe a string ',

        'dept.required ' => 'dept Mustbe a required ',
        'dept.required ' => 'dept Mustbe a required ',

        'description.required ' => 'description Mustbe a required ',
        'description.required ' => 'description Mustbe a required ',
      

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
         $request->image->move(public_path('storage/notice'), $file_name);
    
    
         $data = [
      
           'name' =>$name,
           'user_id' =>$userid,
           'semester' =>$request->semester,
           'description' =>$request->description,
           'dept' =>$request->dept,
           'image' =>$file_name,
        
         ];
      

     
      
      
      notice::create($data);
    


      return redirect()->back()->with('message', 'Your message here');
}
    
  
public function delete_notice($id)
{

    $notice=notice::find($id);


    $image_path =public_path('storage/notice/'.$notice->image);
    if(file_exists($image_path))
    {
        unlink($image_path);
    }
    
    
    $notice->delete();

    return redirect()->back()->with('message','notice deleted successfully');
        
}
   




}
