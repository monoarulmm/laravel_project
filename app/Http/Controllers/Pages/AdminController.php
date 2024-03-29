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

class AdminController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $users = User::all();
        $totalstudents = User::where('usertype', '=', 'student')->get()->count();
        $totalteachers = User::where('usertype', '=', 'teacher')->get()->count();
        return view('content.admin.dashboard', compact('users','totalteachers','totalstudents'));
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
}
