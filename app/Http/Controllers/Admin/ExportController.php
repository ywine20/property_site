<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Models\User;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function create()
    {
        $users = User::all();
        return Excel::download(new UsersExport, 'customer_list.xlsx');
        // return $users;
        // return view('admin.customer.export', compact('users'));
    }

    // public function exportToExcel()
    // {
    //     $users = User::all();
    //     // return Excel::download(new UsersExport($users), 'users.xlsx');

    // }

    // public function exportToPDF()
    // {
    //     $users = User::all();
    //     $pdf = PDF::loadView('admin.users.export', compact('users'));
    //     return $pdf->download('users.pdf');
    // }
}
