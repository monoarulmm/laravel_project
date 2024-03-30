<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\program;
use App\Models\department;
use App\Models\course;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\suggestion;
use App\Models\notice;



class AdminController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $users = User::all();
        $totalstudents = User::where('usertype', '=', 'student')->get()->count();
        $totalteachers = User::where('usertype', '=', 'teacher')->get()->count();
        return view('content.admin.dashboard', compact('users', 'totalteachers', 'totalstudents'));
    }

    public function deptAll()
    {
        $departments = department::all();
        return view('content.admin.deparment', compact('departments'));
    }
    public function deptAdd()
    {

        return view('content.admin.deptAdd');
    }


    public function courseAll()
    {
        $courses = course::all();
        return view('content.admin.courses', compact('courses'));
    }
    public function courseAdd()
    {

        return view('content.admin.courseAdd');
    }

    public function add_course(Request $request)
    {

        $request->validate(
            [


                'name' => 'string|required',
                'project' => 'string|required',
                'batch' => 'string|required',
                'duration' => 'string|required',
                'stu_sit' => 'string|required',
                'description' => 'string|required',
                'image' => 'image|file|required|max:5120',


            ],


            [


                'name.string ' => 'name Mustbe a string ',
                'name.string ' => 'name Mustbe a string ',
                'project.required ' => 'project Mustbe a required ',
                'project.required ' => 'project Mustbe a required ',
                'batch.required ' => 'batch Mustbe a required ',
                'batch.required ' => 'batch Mustbe a required ',
                'duration.required ' => 'duration Mustbe a required ',
                'duration.required ' => 'duration Mustbe a required ',
                'stu_sit.required ' => 'stu_sit Mustbe a required ',
                'stu_sit.required ' => 'stu_sit Mustbe a required ',
                'description.required ' => 'description Mustbe a required ',
                'description.required ' => 'description Mustbe a required ',


                'image.file' => 'file must be type of file',
                'image.image' => 'file must be image',
                'image.required' => 'you must choose a file',
                'image.size' => 'max file size id 10024KB',



            ]
        );



        // image file name
        $file_name = time() . Str::upper(Str::random(16)) . '.' . $request->image->extension();
        // move the  image
        $request->image->move(public_path('storage/course'), $file_name);


        $data = [


            'name' => $request->name,
            'project' => $request->project,
            'batch' => $request->batch,
            'duration' => $request->duration,
            'stu_sit' => $request->stu_sit,
            'description' => $request->description,
            'image' => $file_name,

        ];





        course::create($data);



        return redirect()->back()->with('message', 'course-added successfully');
    }





    public function delete_course($id)
    {

        $course = course::find($id);


        $image_path = public_path('storage/course/' . $course->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }


        $course->delete();

        return redirect()->back()->with('message', 'course deleted successfully');
    }



    public function programAll()
    {

        $programs = program::all();


        return view('content.admin.programs', compact('programs'));
    }


    public function programAdd()
    {


        return view('content.admin.programAdd');
    }



    public function add_program(Request $request)
    {

        $request->validate(
            [


                'program' => 'string|required',
                'image' => 'image|file|required|max:5120',


            ],


            [


                'program.string ' => ' program Mustbe a string ',
                'program.required ' => ' program Mustbe a required ',


                'image.file' => 'file must be type of file',
                'image.image' => 'file must be image',
                'image.required' => 'you must choose a file',
                'image.size' => 'max file size id 10024KB',



            ]
        );



        // image file name
        $file_name = time() . Str::upper(Str::random(16)) . '.' . $request->image->extension();
        // move the  image
        $request->image->move(public_path('storage/program'), $file_name);


        $data = [


            'program' => $request->program,
            'image' => $file_name,

        ];





        program::create($data);



        return redirect()->back()->with('message', 'program-added successfully');
    }





    public function delete_program($id)
    {

        $program = program::find($id);


        $image_path = public_path('storage/program/' . $program->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }


        $program->delete();

        return redirect()->back()->with('message', 'program deleted successfully');
    }


    public function add_department(Request $request)
    {

        $request->validate(
            [


                'name' => 'string|required',
                'owner' => 'string|required',
                'description' => 'string|required',

                'shortdesc1' => 'string|required',
                'shortdesc2' => 'string|required',
                'shortdesc3' => 'string|required',
                'shortdesc4' => 'string|required',
                'shortdesc5' => 'string|required',

                'image' => 'image|file|required|max:5120',

                'lab1' => 'image|file|required|max:5120',
                'lab2' => 'image|file|required|max:5120',
                'lab3' => 'image|file|required|max:5120',
                'lab4' => 'image|file|required|max:5120',
                'lab5' => 'image|file|required|max:5120',

                'teacher1' => 'image|file|required|max:5120',
                'teacher2' => 'image|file|required|max:5120',
                'teacher3' => 'image|file|required|max:5120',
                'teacher4' => 'image|file|required|max:5120',


            ],


            [





                'name.string ' => 'name Mustbe a string ',
                'name.required ' => 'name Mustbe a required ',

                'owner.string ' => 'owner Mustbe a string ',
                'owner.required ' => 'owner Mustbe a required ',


                'shortdesc1.string ' => 'shortdesc1 Mustbe a string ',
                'shortdesc1.required ' => 'shortdesc1 Mustbe a required ',

                'shortdesc2.string ' => 'shortdesc2 Mustbe a string ',
                'shortdesc2.required ' => 'shortdesc2 Mustbe a required ',

                'shortdesc3.string ' => 'shortdesc3 Mustbe a string ',
                'shortdesc3.required ' => 'shortdesc3 Mustbe a required ',

                'shortdesc4.string ' => 'shortdesc4 Mustbe a string ',
                'shortdesc4.required ' => 'shortdesc4 Mustbe a required ',

                'shortdesc5.string ' => 'shortdesc5 Mustbe a string ',
                'shortdesc5.required ' => 'shortdesc5 Mustbe a required ',

                'description.string ' => 'description Mustbe a string ',
                'description.required ' => 'description Mustbe a required ',

                'image.file' => 'file must be type of file',
                'image.image' => 'file must be image',
                'image.required' => 'you must choose a file',
                'image.size' => 'max file size id 5120KB',

                'teacher1.file' => 'file must be type of file',
                'teacher1.image' => 'file must be image',
                'teacher1.required' => 'you must choose a file',
                'image.size' => 'max file size id 5120KB',

                'teacher2.file' => 'file must be type of file',
                'teacher2.image' => 'file must be image',
                'teacher2.required' => 'you must choose a file',
                'image.size' => 'max file size id 5120KB',

                'teacher3.file' => 'file must be type of file',
                'teacher3.image' => 'file must be image',
                'teacher3.required' => 'you must choose a file',
                'image.size' => 'max file size id 5120KB',

                'teacher4.file' => 'file must be type of file',
                'teacher4.image' => 'file must be image',
                'teacher4.required' => 'you must choose a file',
                'image.size' => 'max file size id 5120KB',


                'lab1.file' => 'file must be type of file',
                'lab1.image' => 'file must be image',
                'lab1.required' => 'you must choose a file',
                'image.size' => 'max file size id 5120KB',

                'lab2.file' => 'file must be type of file',
                'lab2.image' => 'file must be image',
                'lab2.required' => 'you must choose a file',
                'image.size' => 'max file size id 5120KB',

                'lab3.file' => 'file must be type of file',
                'lab3.image' => 'file must be image',
                'lab3.required' => 'you must choose a file',
                'image.size' => 'max file size id 5120KB',

                'lab4.file' => 'file must be type of file',
                'lab4.image' => 'file must be image',
                'lab4.required' => 'you must choose a file',
                'image.size' => 'max file size id 5120KB',

                'lab5.file' => 'file must be type of file',
                'lab5.image' => 'file must be image',
                'lab5.required' => 'you must choose a file',
                'image.size' => 'max file size id 5120KB',



            ]
        );




        // image file name
        $file_name = time() . Str::upper(Str::random(16)) . '.' . $request->image->extension();
        // move the  image
        $request->image->move(public_path('storage/department'), $file_name);

        // lab2 file name1
        $file_name1 = time() . Str::upper(Str::random(16)) . '.' . $request->lab1->extension();
        // move the  image
        $request->lab1->move(public_path('storage/department'), $file_name1);


        // image file name
        $file_name2 = time() . Str::upper(Str::random(16)) . '.' . $request->lab2->extension();
        // move the  image
        $request->lab2->move(public_path('storage/department'), $file_name2);

        // image file name
        $file_name3 = time() . Str::upper(Str::random(16)) . '.' . $request->lab3->extension();
        // move the  image
        $request->lab3->move(public_path('storage/department'), $file_name3);

        // image file name
        $file_name4 = time() . Str::upper(Str::random(16)) . '.' . $request->lab4->extension();
        // move the  image
        $request->lab4->move(public_path('storage/department'), $file_name4);

        // image file name
        $file_name5 = time() . Str::upper(Str::random(16)) . '.' . $request->lab5->extension();
        // move the  image
        $request->lab5->move(public_path('storage/department'), $file_name5);



        // image file name
        $file_name6 = time() . Str::upper(Str::random(16)) . '.' . $request->teacher1->extension();
        // move the  image
        $request->teacher1->move(public_path('storage/department'), $file_name6);
        // image file name
        $file_name7 = time() . Str::upper(Str::random(16)) . '.' . $request->teacher2->extension();
        // move the  image
        $request->teacher2->move(public_path('storage/department'), $file_name7);
        // image file name
        $file_name8 = time() . Str::upper(Str::random(16)) . '.' . $request->teacher3->extension();
        // move the  image
        $request->teacher3->move(public_path('storage/department'), $file_name8);
        // image file name
        $file_name9 = time() . Str::upper(Str::random(16)) . '.' . $request->teacher4->extension();
        // move the  image
        $request->teacher4->move(public_path('storage/department'), $file_name9);



        $data = [




            'name' => $request->name,
            'owner' => $request->owner,
            'description' => $request->description,



            'shortdesc1' => $request->shortdesc1,
            'shortdesc2' => $request->shortdesc2,
            'shortdesc3' => $request->shortdesc3,
            'shortdesc4' => $request->shortdesc4,
            'shortdesc5' => $request->shortdesc5,




            'image' => $file_name,
            'lab1' => $file_name1,
            'lab2' => $file_name2,
            'lab3' => $file_name3,
            'lab4' => $file_name4,
            'lab5' => $file_name5,

            'teacher1' => $file_name6,
            'teacher2' => $file_name7,
            'teacher3' => $file_name8,
            'teacher4' => $file_name9,


        ];





        department::create($data);


        return redirect()->back()->with('message', 'department-added successfully');
    }





    public function delete_department($id)
    {

        $department = department::find($id);


        $image_path = public_path('storage/department/' . $department->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $image_path = public_path('storage/department/' . $department->lab1);
        if (file_exists($image_path)) {
            unlink($image_path);
        }


        $image_path = public_path('storage/department/' . $department->lab2);
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $image_path = public_path('storage/department/' . $department->lab3);
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $image_path = public_path('storage/department/' . $department->lab4);
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $image_path = public_path('storage/department/' . $department->lab5);
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $image_path = public_path('storage/department/' . $department->teacher1);
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $image_path = public_path('storage/department/' . $department->teacher2);
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $image_path = public_path('storage/department/' . $department->teacher3);
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $image_path = public_path('storage/department/' . $department->teacher4);
        if (file_exists($image_path)) {
            unlink($image_path);
        }







        $department->delete();

        return redirect()->back()->with('message', 'department deleted successfully');
    }



    public function dept_update_page($id)
    {



        $department = department::find($id);



        return view('content.admin.deptUpdate', compact('department'));
    }







    // public function update_department_confirm(Request $request,  $id)
    // {

    //     $request->validate(
    //         [


    //             'name' => 'string|required',
    //             'owner' => 'string|required',
    //             'description' => 'string|required',

    //             'shortdesc1' => 'string|required',
    //             'shortdesc2' => 'string|required',
    //             'shortdesc3' => 'string|required',
    //             'shortdesc4' => 'string|required',
    //             'shortdesc5' => 'string|required',

    //             'image' => 'image|file|required|max:5120',

    //             'lab1' => 'image|file|required|max:5120',
    //             'lab2' => 'image|file|required|max:5120',
    //             'lab3' => 'image|file|required|max:5120',
    //             'lab4' => 'image|file|required|max:5120',
    //             'lab5' => 'image|file|required|max:5120',

    //             'teacher1' => 'image|file|required|max:5120',
    //             'teacher2' => 'image|file|required|max:5120',
    //             'teacher3' => 'image|file|required|max:5120',
    //             'teacher4' => 'image|file|required|max:5120',


    //         ],


    //         [





    //             'name.string ' => 'name Mustbe a string ',
    //             'name.required ' => 'name Mustbe a required ',

    //             'owner.string ' => 'owner Mustbe a string ',
    //             'owner.required ' => 'owner Mustbe a required ',


    //             'shortdesc1.string ' => 'shortdesc1 Mustbe a string ',
    //             'shortdesc1.required ' => 'shortdesc1 Mustbe a required ',

    //             'shortdesc2.string ' => 'shortdesc2 Mustbe a string ',
    //             'shortdesc2.required ' => 'shortdesc2 Mustbe a required ',

    //             'shortdesc3.string ' => 'shortdesc3 Mustbe a string ',
    //             'shortdesc3.required ' => 'shortdesc3 Mustbe a required ',

    //             'shortdesc4.string ' => 'shortdesc4 Mustbe a string ',
    //             'shortdesc4.required ' => 'shortdesc4 Mustbe a required ',

    //             'shortdesc5.string ' => 'shortdesc5 Mustbe a string ',
    //             'shortdesc5.required ' => 'shortdesc5 Mustbe a required ',

    //             'description.string ' => 'description Mustbe a string ',
    //             'description.required ' => 'description Mustbe a required ',

    //             'image.file' => 'file must be type of file',
    //             'image.image' => 'file must be image',
    //             'image.required' => 'you must choose a file',
    //             'image.size' => 'max file size id 5120KB',

    //             'teacher1.file' => 'file must be type of file',
    //             'teacher1.image' => 'file must be image',
    //             'teacher1.required' => 'you must choose a file',
    //             'image.size' => 'max file size id 5120KB',

    //             'teacher2.file' => 'file must be type of file',
    //             'teacher2.image' => 'file must be image',
    //             'teacher2.required' => 'you must choose a file',
    //             'image.size' => 'max file size id 5120KB',

    //             'teacher3.file' => 'file must be type of file',
    //             'teacher3.image' => 'file must be image',
    //             'teacher3.required' => 'you must choose a file',
    //             'image.size' => 'max file size id 5120KB',

    //             'teacher4.file' => 'file must be type of file',
    //             'teacher4.image' => 'file must be image',
    //             'teacher4.required' => 'you must choose a file',
    //             'image.size' => 'max file size id 5120KB',


    //             'lab1.file' => 'file must be type of file',
    //             'lab1.image' => 'file must be image',
    //             'lab1.required' => 'you must choose a file',
    //             'image.size' => 'max file size id 5120KB',

    //             'lab2.file' => 'file must be type of file',
    //             'lab2.image' => 'file must be image',
    //             'lab2.required' => 'you must choose a file',
    //             'image.size' => 'max file size id 5120KB',

    //             'lab3.file' => 'file must be type of file',
    //             'lab3.image' => 'file must be image',
    //             'lab3.required' => 'you must choose a file',
    //             'image.size' => 'max file size id 5120KB',

    //             'lab4.file' => 'file must be type of file',
    //             'lab4.image' => 'file must be image',
    //             'lab4.required' => 'you must choose a file',
    //             'image.size' => 'max file size id 5120KB',

    //             'lab5.file' => 'file must be type of file',
    //             'lab5.image' => 'file must be image',
    //             'lab5.required' => 'you must choose a file',
    //             'image.size' => 'max file size id 5120KB',



    //         ]
    //     );



    //     $get_data = department::where('id', $id)->first();
    //     $image_name =  $get_data->image;

    //     $image_name1 =  $get_data->lab1;
    //     $image_name2 =  $get_data->lab2;
    //     $image_name3 =  $get_data->lab3;
    //     $image_name4 =  $get_data->lab4;
    //     $image_name5 =  $get_data->lab5;


    //     $image_name6 =  $get_data->teacher1;
    //     $image_name7 =  $get_data->teacher2;
    //     $image_name8 =  $get_data->teacher3;
    //     $image_name9 =  $get_data->teacher4;





    //     $getData = department::where('id', $id)->first();
    //     $imageName = $getData->image;


    //     if ($request->hasFile('image')) {
    //         if (File::exists(public_path('storage/department/') . $imageName)) {
    //             File::delete(public_path('storage/department/') . $imageName);
    //         }


    //         // Hanfle the file name for Database
    //         $file_name = time() . Str::upper(Str::random(16)) . '.' . $request->image->extension();
    //         // move the file
    //         $request->image->move(public_path('storage/department'), $file_name);
    //     } else {
    //         $file_name = $getData->image;
    //     }








    //     $imageName1 = $getData->lab1;

    //     if ($request->hasFile('image')) {
    //         if (File::exists(public_path('storage/department/') . $imageName1)) {
    //             File::delete(public_path('storage/department/') . $imageName1);
    //         }


    //     // lab2 file name1
    //     $file_name1 = time() . Str::upper(Str::random(16)) . '.' . $request->lab1->extension();
    //     // move the  image
    //     $request->lab1->move(public_path('storage/department'), $file_name1);


    //     } else {
    //         $file_name1 = $getData->lab1;
    //     }






    //     $imageName2 = $getData->lab2;

    //     if ($request->hasFile('image')) {
    //         if (File::exists(public_path('storage/department/') . $imageName2)) {
    //             File::delete(public_path('storage/department/') . $imageName2);
    //         }


    //     // lab2 file name1
    //     $file_name2 = time() . Str::upper(Str::random(16)) . '.' . $request->lab2->extension();
    //     // move the  image
    //     $request->lab2->move(public_path('storage/department'), $file_name2);


    //     } else {
    //         $file_name2 = $getData->lab2;
    //     }






    //     $imageName3 = $getData->lab3;

    //     if ($request->hasFile('image')) {
    //         if (File::exists(public_path('storage/department/') . $imageName3)) {
    //             File::delete(public_path('storage/department/') . $imageName3);
    //         }


    //     // lab2 file name1
    //     $file_name3 = time() . Str::upper(Str::random(16)) . '.' . $request->lab3->extension();
    //     // move the  image
    //     $request->lab3->move(public_path('storage/department'), $file_name3);


    //     } else {
    //         $file_name3 = $getData->lab3;
    //     }




    //     $imageName4 = $getData->lab4;

    //     if ($request->hasFile('image')) {
    //         if (File::exists(public_path('storage/department/') . $imageName4)) {
    //             File::delete(public_path('storage/department/') . $imageName4);
    //         }


    //     // lab2 file name1
    //     $file_name4 = time() . Str::upper(Str::random(16)) . '.' . $request->lab4->extension();
    //     // move the  image
    //     $request->lab4->move(public_path('storage/department'), $file_name4);


    //     } else {
    //         $file_name4 = $getData->lab4;
    //     }





    //     $imageName5 = $getData->lab5;

    //     if ($request->hasFile('image')) {
    //         if (File::exists(public_path('storage/department/') . $imageName5)) {
    //             File::delete(public_path('storage/department/') . $imageName5);
    //         }


    //     // lab2 file name1
    //     $file_name5 = time() . Str::upper(Str::random(16)) . '.' . $request->lab5->extension();
    //     // move the  image
    //     $request->lab5->move(public_path('storage/department'), $file_name5);


    //     } else {
    //         $file_name5 = $getData->lab5;
    //     }





    //     $imageName6 = $getData->teacher1;

    //     if ($request->hasFile('image')) {
    //         if (File::exists(public_path('storage/department/') . $imageName6)) {
    //             File::delete(public_path('storage/department/') . $imageName6);
    //         }


    //     // lab2 file name1
    //     $file_name6 = time() . Str::upper(Str::random(16)) . '.' . $request->teacher1->extension();
    //     // move the  image
    //     $request->teacher1->move(public_path('storage/department'), $file_name6);


    //     } else {
    //         $file_name6 = $getData->teacher1;
    //     }





    //     $imageName7 = $getData->teacher2;

    //     if ($request->hasFile('image')) {
    //         if (File::exists(public_path('storage/department/') . $imageName7)) {
    //             File::delete(public_path('storage/department/') . $imageName7);
    //         }


    //     // lab2 file name1
    //     $file_name7 = time() . Str::upper(Str::random(16)) . '.' . $request->teacher2->extension();
    //     // move the  image
    //     $request->teacher2->move(public_path('storage/department'), $file_name7);


    //     } else {
    //         $file_name7 = $getData->teacher2;
    //     }



    //     $imageName8 = $getData->teacher3;

    //     if ($request->hasFile('image')) {
    //         if (File::exists(public_path('storage/department/') . $imageName8)) {
    //             File::delete(public_path('storage/department/') . $imageName8);
    //         }


    //     // lab2 file name1
    //     $file_name8 = time() . Str::upper(Str::random(16)) . '.' . $request->teacher3->extension();
    //     // move the  image
    //     $request->teacher3->move(public_path('storage/department'), $file_name8);


    //     } else {
    //         $file_name8 = $getData->teacher3;
    //     }


    //     $imageName9 = $getData->teacher4;

    //     if ($request->hasFile('image')) {
    //         if (File::exists(public_path('storage/department/') . $imageName9)) {
    //             File::delete(public_path('storage/department/') . $imageName9);
    //         }


    //     // lab2 file name1
    //     $file_name9 = time() . Str::upper(Str::random(16)) . '.' . $request->teacher4->extension();
    //     // move the  image
    //     $request->teacher4->move(public_path('storage/department'), $file_name9);


    //     } else {
    //         $file_name9 = $getData->teacher4;
    //     }



    //     $data = [




    //         'name' => $request->name,
    //         'owner' => $request->owner,
    //         'description' => $request->description,



    //         'shortdesc1' => $request->shortdesc1,
    //         'shortdesc2' => $request->shortdesc2,
    //         'shortdesc3' => $request->shortdesc3,
    //         'shortdesc4' => $request->shortdesc4,
    //         'shortdesc5' => $request->shortdesc5,




    //         'image' => $file_name,

            
    //         'lab1' => $file_name1,
    //         'lab2' => $file_name2,
    //         'lab3' => $file_name3,
    //         'lab4' => $file_name4,
    //         'lab5' => $file_name5,

    //         'teacher1' => $file_name6,
    //         'teacher2' => $file_name7,
    //         'teacher3' => $file_name8,
    //         'teacher4' => $file_name9,


    //     ];






    //     department::findOrFail($id)->update($data);

    //     return redirect()->back()->with('message', 'department updated successfully');
    // }



    public function update_department_confirm(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'owner' => 'required|string',
            'description' => 'required|string',
            'shortdesc1' => 'required|string',
            'shortdesc2' => 'required|string',
            'shortdesc3' => 'required|string',
            'shortdesc4' => 'required|string',
            'shortdesc5' => 'required|string',
            'image' => 'image|file|max:5120',
            'lab1' => 'image|file|max:5120',
            'lab2' => 'image|file|max:5120',
            'lab3' => 'image|file|max:5120',
            'lab4' => 'image|file|max:5120',
            'lab5' => 'image|file|max:5120',
            'teacher1' => 'image|file|max:5120',
            'teacher2' => 'image|file|max:5120',
            'teacher3' => 'image|file|max:5120',
            'teacher4' => 'image|file|max:5120',
        ]);
    
        // Get the department data
        $department = department::findOrFail($id);
    
        // Update the 'image' if present
        if ($request->hasFile('image')) {
            $this->deleteFile($department->image); // Delete old image
            $imageFileName = $this->moveAndReturnFileName($request->file('image'), 'department');
        } else {
            $imageFileName = $department->image;
        }
    
        // Update lab files
        $labFiles = ['lab1', 'lab2', 'lab3', 'lab4', 'lab5'];
        foreach ($labFiles as $labFile) {
            if ($request->hasFile($labFile)) {
                $this->deleteFile($department->$labFile); // Delete old lab file
                $$labFile = $this->moveAndReturnFileName($request->file($labFile), 'department');
            } else {
                $$labFile = $department->$labFile;
            }
        }
    
        // Update teacher files
        $teacherFiles = ['teacher1', 'teacher2', 'teacher3', 'teacher4'];
        foreach ($teacherFiles as $teacherFile) {
            if ($request->hasFile($teacherFile)) {
                $this->deleteFile($department->$teacherFile); // Delete old teacher file
                $$teacherFile = $this->moveAndReturnFileName($request->file($teacherFile), 'department');
            } else {
                $$teacherFile = $department->$teacherFile;
            }
        }
    
        // Update department data
        $data = [
            'name' => $request->name,
            'owner' => $request->owner,
            'description' => $request->description,
            'shortdesc1' => $request->shortdesc1,
            'shortdesc2' => $request->shortdesc2,
            'shortdesc3' => $request->shortdesc3,
            'shortdesc4' => $request->shortdesc4,
            'shortdesc5' => $request->shortdesc5,
            'image' => $imageFileName,
            'lab1' => $lab1,
            'lab2' => $lab2,
            'lab3' => $lab3,
            'lab4' => $lab4,
            'lab5' => $lab5,
            'teacher1' => $teacher1,
            'teacher2' => $teacher2,
            'teacher3' => $teacher3,
            'teacher4' => $teacher4,
        ];
    
        // Update department in the database
        $department->update($data);
    
        return redirect()->back()->with('message', 'Department updated successfully');
    }
    
    private function moveAndReturnFileName($file, $folder)
    {
        $fileName = time() . Str::random(16) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path("storage/{$folder}"), $fileName);
        return $fileName;
    }
    
    private function deleteFile($fileName)
    {
        if (File::exists(public_path("storage/department/{$fileName}"))) {
            File::delete(public_path("storage/department/{$fileName}"));
        }
    }











    public function teacherlist()
    {

        $user = Auth::user();

        $teachers = User::where('usertype', '=', 'teacher')->get();
        return view('content.admin.teacherlist', compact('teachers'));
    }


    public function studentlist()
    {

        $user = Auth::user();

        $students = User::where('usertype', '=', 'student')->get();
        return view('content.admin.studentlist', compact('students'));
    }

    public function teacher($id)
    {
        $user = Auth::user();
        $teacher = User::find($id);

        $teacher->usertype = "teacher";

        $teacher->save();

        return redirect()->back();
    }










    public function delete_suggestion($id)
{
    $suggestion = Suggestion::find($id);

    if (!$suggestion) {
        return redirect()->back()->with('error', 'Suggestion not found');
    }

    // Retrieve all files associated with the suggestion
    $fileNames = json_decode($suggestion->files, true);

    foreach ($fileNames as $fileName) {
        $file_path = public_path('storage/suggestion/' . $fileName);
        if (File::exists($file_path)) {
            File::delete($file_path); // Delete the file from storage
        }
    }

    // Optionally, you can delete the file records from the database
    $suggestion->files()->delete();

    // Delete the suggestion record
    $suggestion->delete();

    return redirect()->back()->with('message', 'Suggestion and associated files deleted successfully');
}






    public function delete_notice($id)
{
    $notice = Notice::find($id);

    if (!$notice) {
        return redirect()->back()->with('error', 'Notice not found');
    }

    // Delete associated file
    $file_path = public_path('storage/notice/' . $notice->file);
    if (File::exists($file_path)) {
        // Attempt to delete the file
        if (File::delete($file_path)) {
            // If file deletion is successful, delete the notice record
            $notice->delete();
            return redirect()->back()->with('message', 'Notice deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete the associated file');
        }
    } else {
        // If the file doesn't exist, still attempt to delete the notice record
        $notice->delete();
        return redirect()->back()->with('message', 'Notice deleted successfully, but associated file not found');
    }
}
    
}
