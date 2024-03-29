public function add_notice(Request $request)
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
       
        //  image file name
         $file_name = time() . Str::upper(Str::random(16)) . '.' . $request->image->extension();
        //  move the  image
         $request->image->move(public_path('storage/notice'), $file_name);
    
    
         $data = [
      
           'name' =>$name,
           'semester' =>$request->semester,
           'subject' =>$request->subject,
           'dept' =>$request->dept,
           'image' =>$file_name,
        
         ];
      

     
      
      
      notice::create($data);
    


      return redirect()->back()->with('message', 'Your message here');
}