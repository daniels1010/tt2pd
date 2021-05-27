<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $school = $request->user()->school;

        return view('users/index')->with('students', $school->getStudents()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $nameRule = 'required|string|min:2|max:50';
    //     $rules = array(
    //         'first_name' => $nameRule,
    //         'last_name' => $nameRule,
    //         'email' => [
    //             'required',
    //             'email',
    //             'min:2',
    //             'max:50',
    //             Rule::unique('users', 'email')->where(function ($query) use ($request) {
    //                 return $query->where('email', $request->email);
    //             })
    //         ],
    //     );

    //     $this->validate($request, $rules);

    //     $user = new User();
    //     $user->school_id = $request->user()->school->id;
    //     $user->type = 3;
    //     $user->fill($request->all());
    //     $user->save();

    //     return redirect('users/' . $user->id);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();   
        return view('users/view')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        
        return view('users/update')->with('user', $user);
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
        $user = User::where('id', $id);
        $user->update($request->except(['_method', '_token']));

        return redirect('users/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back();
    }
}
