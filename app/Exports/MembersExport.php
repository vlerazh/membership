<?php

namespace App\Exports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Session;
class MembersExport implements FromCollection ,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Member::where('course_id', Session::get('course_id'));
    }
    public function headings() : array
    {
        return ["Id", "Name", "Lastname", "Email", "Phone", "Address", "City", "Country", "Created_at", "Updated_at"];
    }
}
