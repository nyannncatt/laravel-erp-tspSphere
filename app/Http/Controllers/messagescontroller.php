<?php


namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;

class messagescontroller extends Controller
{
    // Display a listing of the messages
    public function index()
    {
        $messages = Messages::all();
        return view('admin.messages.index', compact('messages'));
    }

    // Show the form for creating a new message
    public function create()
    {
        return view('admin.messages.create');
    }

    // Store a newly created message
    public function store(Request $request)
    {
        $request->validate([
            'sender' => 'required|string',
            'role' => 'required|string',
            'subject' => 'required|string',
            'content' => 'required|string',
        ]);

        Messages::create($request->all());

        return redirect()->route('messages.index')->with('success', 'Message sent successfully!');
    }

    // Show the form for editing a message
    public function edit($id)
    {
        $message = Messages::findOrFail($id);
        return view('admin.messages.edit', compact('message'));
    }

    // Update the specified message in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'sender' => 'required|string',
            'role' => 'required|string',
            'subject' => 'required|string',
            'content' => 'required|string',
        ]);

        $message = Messages::findOrFail($id);
        $message->update($request->all());

        return redirect()->route('messages.index')->with('success', 'Message updated successfully!');
    }

    // Remove the specified message from the database
    public function destroy($id)
    {
        $message = Messages::findOrFail($id);
        $message->delete();

        return redirect()->route('messages.index')->with('success', 'Message deleted successfully!');
    }
}
