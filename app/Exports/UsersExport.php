<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::all();

        return view('admin.users.export', [
            'users' => $users
        ]);
    }
    public function headings(): array
    {
        return [
            'NO',
            'Name',
            'Email',
            '',
            'Phone',
            'Profile',
            'Tire',
            'Modify Date',

        ];
    }
}
