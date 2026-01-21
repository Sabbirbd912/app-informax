<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactReplyMail;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->get();

        return view('adminpanel.contact.messages.index', compact('messages'));
    }

    public function show(ContactMessage $message)
    {
        return view('adminpanel.contact.messages.show', compact('message'));
    }

    public function reply(Request $request, ContactMessage $message)
    {
        $request->validate([
            'reply_message' => 'required|string',
        ]);

        Mail::to($message->email)
            ->send(new ContactReplyMail($request->reply_message));

        return back()->with('success', 'Reply sent successfully');
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();

        return back()->with('success', 'Message deleted');
    }
}
