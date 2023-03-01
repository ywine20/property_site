<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::latest('id')->get();
        return view('admin.contact.index', compact('contact'));
    }

    // public function show($id)
    // {
    //     $contact = Contact::all();
    //     // $getId = DB::table('notifications')->where('data->contact_id', $id)->pluck('id');
    //     DB::table('notifications')->update(['read_at'=>now()]);
    //     return view('admin.contact.index', compact('contact'));
    // }

    public function detail($id)
    {
        $contacts = Contact::latest('id')->get();

        $contact = Contact::find($id);
        // dump($contact);
        // dump($contacts);
        return view('admin.contact.show', [
            "contact"=>$contact,
            "contacts"=>$contacts
        ]);
    }

    public function delete($id)
    {
        $contact = Contact::where('id', $id);
        if(!$contact->first()){
            return redirect()->back()->with('error', 'not found contact');
        }
        $contact->delete();
	//return redirect()->back()->with('status','Deleted successful');
        return response()->json([
            "status" => 'success',
            "info"=>'delete successful'
        ]);
        // return redirect('/admin/contact')->with('success', 'your contact has been deleted successfully.');
    }

}
