<?php

namespace App\Http\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;


class UserExport implements FromCollection
{
    public function collection()
    {
        return User::all();
    }
}
