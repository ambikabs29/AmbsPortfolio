<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class MessageController extends Controller
{
    /**
     * Display a specific message.
     */
    public function show($id)
    {
        $message = Contact::findOrFail($id); // Fetch the message by ID
      
        // Mark the message as read
        if (!$message->is_read) {
            $message->is_read = true;
            $message->save();
        }
        
        return view('admin.messages.show', compact('message'));
    }

    /**
     * Delete a specific message.
     */
    public function destroy($id)
    {
        $message = Contact::findOrFail($id); // Fetch and delete the message
        $message->delete();

        return redirect()->route('admin.inbox')->with('success', 'Message deleted successfully.');
    }
}