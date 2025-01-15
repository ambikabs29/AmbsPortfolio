<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class InboxController extends Controller
{
    public function index()
    {
        $messages = Contact::latest()->paginate(10); // Paginate the results
        return view('admin.inbox', compact('messages'));
    }

    public function unreadCount()
    {
        return Contact::where('is_read', false)->count();
    }
}