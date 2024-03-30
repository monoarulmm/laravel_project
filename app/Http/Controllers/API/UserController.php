<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\suggestion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function loginUser(Request $request): Response
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if($validator->fails()){

            return Response(['message' => $validator->errors()],401);
        }
   
        
        if(Auth::attempt($request->all())){

            $id = Auth::id();
            $user = User::find($id);
    
            $success =  $user->createToken('MyApp')->plainTextToken; 
        
            return Response(['token' => $success],200);
        }

        return Response(['message' => 'email or password wrong'],401);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function userDetails(): Response
    {
        if (Auth::check()) {

            $user = Auth::user();

            return Response(['data' => $user],200);
        }

        return Response(['data' => 'Unauthorized'],401);
    }

    /**
     * Display the specified resource.
     */
    public function logout(): Response
    {
        $id = Auth::id();
        $user = User::find($id);

        $user->currentAccessToken()->delete();
        
        return Response(['data' => 'User Logout successfully.'],200);
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
        

          return Response(['message' => 'suggestoion created successfully.'],200);
          
    }


    


















}