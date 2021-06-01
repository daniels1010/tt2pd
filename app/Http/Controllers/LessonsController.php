<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\File;
use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LessonsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $lessons = Lesson::all();
        $isTeacher = $user->isTeacher();
        $isAdmin = $user->isAdmin();
        
        return view('lessons/index', ['user' => $user, 'lessons' => $lessons, 'isTeacher' => $isTeacher, 'isAdmin' => $isAdmin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lessons/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:5|max:50',
            'description' => 'string|min:2|max:255|nullable',
            'poster_url' => 'required|string|min:5|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } 

        $userId = Auth::user()->id;
        $schoolId = Auth::user()->school_id;
        $lesson = new Lesson();
        $lesson->fill($request->all());
        $lesson->school_id = $schoolId;
        $lesson->author_id = $userId;
        $lesson->file_id = 1;
        $lesson->created_at = date('Y-m-d H:i:s');
        $lesson->save();

        return redirect('lessons/' . $lesson->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::where('id', $id)->first();
        $file = File::where('id', $lesson->file_id)->get();
        // imeeedž https://i.ibb.co/1QF7bhw/missing-picture.jpg
        // vidjio https://i.ibb.co/ZxyR7gP/missing-video.jpg
        return view('lessons/view', ['lesson' => $lesson, 'file' => $file]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        return view('lessons/update', []);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return redirect('lessons/view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect('lessons');
    }
}
