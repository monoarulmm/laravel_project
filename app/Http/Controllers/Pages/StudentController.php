<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\department;
use App\Models\studentinfo;
use App\Models\suggestion;
use App\Models\notice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Completion\Suggestion as CompletionSuggestion;

class StudentController extends Controller
{
    public function index()
    {
 
         
        $user=Auth::user();
        return view('content.student.dashboard',compact('user'));
    }

   

    public function studentsuggestion($user_id)
    {


        

       
        // $suggestions = suggestion::join('studentinfos', 'suggestions.dept', '=', 'studentinfos.dept')
        //                  ->select('suggestions.*')
        //                  ->get();


        // $suggestions = suggestion::join('studentinfos', function ($join) {
        //     $join->on('suggestions.dept', '=', 'studentinfos.dept')
        //          ->whereColumn('suggestions.semester', '=', 'studentinfos.semester');
        // })
        // ->select('suggestions.*')
        // ->get();
        
        $user=Auth::user();
        $suggestions=suggestion::all();
        return view('content.student.suggestion', compact('suggestions','user'));

    }
    


    
    
    public function studentnotice($user_id)
    {
        // $notices = notice::join('studentinfos', function ($join) {
        //     $join->on('notices.dept', '=', 'studentinfos.dept')
        //          ->whereColumn('notices.semester', '=', 'studentinfos.semester');
        // })
        // ->select('notices.*')
        // ->get();
        $user=Auth::user();
        $notices=notice::all();
        return view('content.student.notice', compact('notices','user'));
      
    }
    
   


}




