<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\department;
use App\Models\suggestion;
use App\Models\notice;
use App\Models\File;
use Illuminate\Support\Facades\File as FileManager;

class HomeController extends Controller
{
    public function index()
    {
        $departments = department::all();


        $suggestions = suggestion::all();
        $notices = notice::all();


        $user = Auth::user();
        $userid = $user->id;

        $notices = notice::Where('user_id', '=', $userid)->get();
        $suggestions = suggestion::Where('user_id', '=', $userid)->get();



        return view('content.teacher.dashboard', compact('departments', 'suggestions', 'notices'));
    }

    public function teacherhome()
    {
        return view('content.teacher.teachinfo');
    }



    public function add_suggestion(Request $request)
    {
        $request->validate(
            [
                'semester' => 'required|string',
                'dept' => 'required|string',
                'subject' => 'required|string',
                'files.*' => 'required|file|max:5120', // 'files.*' indicates validation for each file in the 'files' array
            ],
            [
                'semester.required' => 'Semester is required',
                'dept.required' => 'Department is required',
                'subject.required' => 'Subject is required',
                'files.*.required' => 'Please upload all files',
                'files.*.file' => 'All files must be valid files',
                'files.*.max' => 'The file size of each file must be less than 5MB',
            ]
        );

        $user = auth()->user();
        $name = $user->name;
        $userid = $user->id;

        $fileNames = [];

        // Process each uploaded file
        foreach ($request->file('files') as $file) {
            $file_name = time() . Str::upper(Str::random(16)) . '.' . $file->extension();
            $file->move(public_path('storage/suggestion'), $file_name);
            $fileNames[] = $file_name; // Store the file name in an array
        }

        // Create the suggestion
        $data = [
            'name' => $name,
            'user_id' => $userid,
            'semester' => $request->semester,
            'subject' => $request->subject,
            'dept' => $request->dept,
            'files' => json_encode($fileNames), // Serialize array to JSON
        ];

        Suggestion::unguard();
        $suggestion = Suggestion::create($data);
        Suggestion::reguard();

        // Now that the suggestion is created, update the suggestion_id for each file
        foreach ($fileNames as $file_name) {
            $newFile = new File();
            $newFile->file_name = $file_name;
            $newFile->suggestion_id = $suggestion->id; // Assign the suggestion ID
            $newFile->save();
        }

        return redirect()->back()->with('message', 'Suggestions added successfully');
    }




  




    // public function add_notice(Request $request)
    // {
    //     $request->validate(
    //         [
    //             'semester' => 'required|string',
    //             'dept' => 'required|string',
    //             'description' => 'required|string',
    //             'files.*' => 'required|file|max:5120', // 'files.*' indicates validation for each file in the 'files' array
    //         ],
    //         [
    //             'semester.required' => 'Semester is required',
    //             'dept.required' => 'Department is required',
    //             'description.required' => 'description is required',
    //             'files.*.required' => 'Please upload all files',
    //             'files.*.file' => 'All files must be valid files',
    //             'files.*.max' => 'The file size of each file must be less than 5MB',
    //         ]
    //     );

    //     $user = auth()->user();
    //     $name = $user->name;
    //     $userid = $user->id;

    //     $fileNames = [];

    //     // Process each uploaded file
    //     foreach ($request->file('files') as $file) {
    //         $file_name = time() . Str::upper(Str::random(16)) . '.' . $file->extension();
    //         $file->move(public_path('storage/notice'), $file_name);
    //         $fileNames[] = $file_name; // Store the file name in an array
    //     }

    //     $data = [
    //         'name' => $name,
    //         'user_id' => $userid,
    //         'semester' => $request->semester,
    //         'description' => $request->description,
    //         'dept' => $request->dept,
    //         'files' => json_encode($fileNames), // Save array of file names
    //     ];

    //     notice::create($data);

    //     return redirect()->back()->with('message', 'notices added successfully');
    // }



    // public function delete_notice($id)
    // {
    //     $notice = notice::find($id);

    //     if ($notice) {
    //         // Check if there are associated files
    //         if ($notice->files()->exists()) {
    //             // Delete associated files
    //             foreach ($notice->files as $file) {
    //                 $file_path = public_path('storage/notice/' . $file->file_name); // Adjust according to your file structure
    //                 if (file_exists($file_path)) {
    //                     unlink($file_path);
    //                 }
    //             }
    //         }

    //         // Delete the notice record
    //         $notice->delete();

    //         return redirect()->back()->with('message', 'notice deleted successfully');
    //     } else {
    //         return redirect()->back()->with('error', 'notice not found');
    //     }
    // }




    // public function add_suggestion(Request $request)
    // {

    //     $request->validate([


    //         'semester' => 'string|required',
    //         'dept' => 'string|required',
    //         'subject' => 'string|required',
    //         'image' => 'image|file|required|max:5120',


    //      ],


    //      [


    //         'semester.string ' => 'deptMustbe a string ',
    //         'semester.string ' => 'deptMustbe a string ',

    //         'dept.required ' => 'dept Mustbe a required ',
    //         'dept.required ' => 'dept Mustbe a required ',

    //         'subject.required ' => 'dept Mustbe a required ',
    //         'subject.required ' => 'dept Mustbe a required ',


    //         'image.file' => 'file must be type of file',
    //         'image.image' => 'file must be image',
    //         'image.required' => 'you must choose a file',
    //         'image.size' => 'max file size id 10024KB',



    //          ]
    //      );

    //       $user=Auth()->user();
    //       $name=$user->name;
    //       $userid=$user->id;


    //         //  image file name
    //          $file_name = time() . Str::upper(Str::random(16)) . '.' . $request->image->extension();
    //         //  move the  image
    //          $request->image->move(public_path('storage/suggestion'), $file_name);


    //          $data = [

    //            'name' =>$name,
    //            'user_id' =>$userid,
    //            'semester' =>$request->semester,
    //            'subject' =>$request->subject,
    //            'dept' =>$request->dept,
    //            'image' =>$file_name,

    //          ];





    //       suggestion::create($data);



    //       return redirect()->back()->with('message', 'Your message here');
    // }



    // public function delete_suggestion($id)
    // {

    //     $suggestion=suggestion::find($id);


    //     $image_path =public_path('storage/suggestion/'.$suggestion->image);
    //     if(file_exists($image_path))
    //     {
    //         unlink($image_path);
    //     }


    //     $suggestion->delete();

    //     return redirect()->back()->with('message','suggestion deleted successfully');

    // }


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



    // public function add_notice(Request $request)
    // {

    //     $request->validate([


    //         'semester' => 'string|required',
    //         'dept' => 'string|required',
    //         'description' => 'string|required',
    //         'image' => 'image|file|required|max:5120',


    //      ],


    //      [


    //         'semester.string ' => 'semester Mustbe a string ',
    //         'semester.string ' => 'semester Mustbe a string ',

    //         'dept.required ' => 'dept Mustbe a required ',
    //         'dept.required ' => 'dept Mustbe a required ',

    //         'description.required ' => 'description Mustbe a required ',
    //         'description.required ' => 'description Mustbe a required ',


    //         'image.file' => 'file must be type of file',
    //         'image.image' => 'file must be image',
    //         'image.required' => 'you must choose a file',
    //         'image.size' => 'max file size id 10024KB',



    //          ]
    //      );

    //         $user=Auth()->user();
    //         $name=$user->name;
    //         $userid=$user->id;

    //         //  image file name
    //          $file_name = time() . Str::upper(Str::random(16)) . '.' . $request->image->extension();
    //         //  move the  image
    //          $request->image->move(public_path('storage/notice'), $file_name);


    //          $data = [

    //            'name' =>$name,
    //            'user_id' =>$userid,
    //            'semester' =>$request->semester,
    //            'description' =>$request->description,
    //            'dept' =>$request->dept,
    //            'image' =>$file_name,

    //          ];





    //       notice::create($data);



    //       return redirect()->back()->with('message', 'Your message here');
    // }


    // public function delete_notice($id)
    // {

    //     $notice=notice::find($id);


    //     $image_path =public_path('storage/notice/'.$notice->image);
    //     if(file_exists($image_path))
    //     {
    //         unlink($image_path);
    //     }


    //     $notice->delete();

    //     return redirect()->back()->with('message','notice deleted successfully');

    // }



    public function add_notice(Request $request)
    {
        $request->validate([
            'semester' => 'required|string',
            'dept' => 'required|string',
            'description' => 'required|string',
            'file' => 'file|required|max:5120', // Adjusted validation rule for any file type
        ]);
    
        $user = Auth()->user();
        $name = $user->name;
        $userid = $user->id;
    
        // File handling
        if ($request->hasFile('file')) {
            // Generating file name
            $file_name = time() . Str::upper(Str::random(16)) . '.' . $request->file->extension();
            // Moving the file to storage
            $request->file->move(public_path('storage/notice'), $file_name);
        } else {
            return redirect()->back()->with('error', 'You must choose a file.');
        }
    
        // Data for notice creation
        $data = [
            'name' => $name,
            'user_id' => $userid,
            'semester' => $request->semester,
            'description' => $request->description,
            'dept' => $request->dept,
            'file' => $file_name, // Storing file name in 'file' column
        ];
    
        // Creating notice
        Notice::create($data);
    
        return redirect()->back()->with('message', 'Notice added successfully');
    }
    






}
