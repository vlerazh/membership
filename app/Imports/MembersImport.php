<?php

namespace App\Imports;

use App\Models\Member;
use App\Models\Course;
use Session;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MembersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $check_member = Member::latest()->first();
        $id; 
        if($check_member == null){
            $id = 1;
        }else{
            $id = $check_member->id + 1;
        }
        $member =   Member::create([
            'name' => $row['name'],
            'lastname' => $row['lastname'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'address' => $row['address'],
            'city' => $row['city'],
            'country' => $row['country']
        ]);
        $saved_member = $member->save();
        $course = Course::where('id', Session::get('course_id'))->get();
        $member->courses()->sync($course);

        return $member ;
    }
}
