<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Course;
use Illuminate\Http\Request;
use Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MembersImport;
use App\Exports\MembersExport;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::whereHas('courses', function($q) {
            $q->where('id', Session::get('course_id'));
        })->get();
        return view('members.index')->with('members',$members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $member = Member::create([
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
        ]);

        $course = Course::where('id', Session::get('course_id'))->get();
        $member->courses()->sync($course);

        return redirect('/members')->with('success', 'Member created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('members.edit')->with('member', $member);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $member->update([
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
        ]);
        return redirect('/members')->with('success', 'Member updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect('/members')->with('success', 'Member deleted');
    }

    public function paid(Request $request, $member_id){
        $member = Member::find($member_id);
        
        $member->courses()->updateExistingPivot(Session::get('course_id'), ['paid' => ($request->get('paid') == "on" ? true : false)]);

        return  redirect('/members')->with('success', 'Paid value has been changed');
        // dd($request->get('paid'));
    }
    public function import(Request $request) 
    {
        Excel::import(new MembersImport,$request->file('import'));

             
        return redirect('/members')->with('success', 'Members imported succesfully');
    }

    public function export() 
    {
        return Excel::download(new MembersExport, 'members.xlsx');
    }
}
