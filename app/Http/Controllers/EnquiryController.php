<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Mail;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Enquiry::query();
    
        if ($request->has('q') && !empty($request->q)) {
            $query->where(function ($q) use ($request) {
                $q->where('forename', 'like', "%{$request->q}%")
                  ->orWhere('surname', 'like', "%{$request->q}%")
                  ->orWhere('email', 'like', "%{$request->q}%")
                  ->orWhere('phone', 'like', "%{$request->q}%")
                  ->orWhere('message', 'like', "%{$request->q}%");
            });
        }
    
        if ($request->has('seen') && $request->seen !== '') {
            $query->where('seen', $request->seen);
        }
    
        $enquiries = $query->orderBy('created_at', 'desc')->get();
    
        return view('admin.enquiries', compact('enquiries'));
    }
    public function create(Request $request){
        $request->validate([
            'forename' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);
    
        // Store enquiry in the database
        Enquiry::create([
            'forename' => $request->forename,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);
    
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new Contact($request));
        return back()->with('success', 'Your message has been sent successfully!');

    }
    public function toggleSeen($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->seen = !$enquiry->seen;
        $enquiry->save();
    
        return redirect()->back()->with('success', 'Enquiry status updated successfully.');
    }
    
}
