<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class SchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::all();
        return view('schools/index')->with('schools', $schools);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schools/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'instrument' => 'required|string|min:2|max:50',
            'logo' => 'string|min:2|max:255',
            'email' => ['required', 'email'],
        ];

        $this->validate($request, $rules);

        $school = new School();
        $school->fill($request->all());
        $school->save();

        return redirect('schools/' . $school->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school = School::where('id', $id)->first();  
        $teacher = $school->getTeacher(); 

        return view('schools/view')->with([
            'school' => $school,
            'teacher' => $teacher,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school = School::where('id', $id)->first();

        return view('schools/update')->with('school', $school);
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
        $school = School::where('id', $id);
        $school->update($request->except(['_method', '_token']));

        return redirect('schools/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        School::where('id', $id)->delete();
        return redirect()->back();
    }

    public function addteacher($id){
        return view('schools/add_teacher')->with('id', $id);
    }

    public function saveTeacher(Request $request, $id){
        $nameRule = 'required|string|min:2|max:50';
        $rules = [
            'first_name' => $nameRule,
            'last_name' => $nameRule,
            'email' => [
                'required',
                'email',
                'min:2',
                'max:50',
                Rule::unique('users', 'email')->where(function ($query) use ($request) {
                    return $query->where('email', $request->email);
                })
            ],
        ];

        $this->validate($request, $rules);

        $teacher = new User();
        $teacher->school_id = $id;
        $teacher->type = 2;
        $teacher->fill($request->all()); 
        $teacher->password = Hash::make($request->password);
        
        $teacher->save();

        return redirect('schools/' . $id);
    }
}
