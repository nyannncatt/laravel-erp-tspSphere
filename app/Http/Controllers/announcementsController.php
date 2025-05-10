<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
use Illuminate\Http\Request;

class announcementsController extends Controller
{
    public function index()
    {
        $announcements = Announcements::latest()->get();
        return view('admin.announcements.index', compact('announcements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Announcements::create($request->only('title', 'content'));

        return redirect()->back()->with('success', 'Announcement added.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $announcement = Announcements::findOrFail($id);
        $announcement->update($request->only('title', 'content'));

        return redirect()->back()->with('success', 'Announcement updated.');
    }

    public function destroy($id)
    {
        $announcement = Announcements::findOrFail($id);
        $announcement->delete();

        return redirect()->back()->with('success', 'Announcement deleted.');
    }
}