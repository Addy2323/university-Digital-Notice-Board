<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin')->only(['create', 'store']);
    }

    public function index(Request $request)
    {
        $query = Notice::with('user')->latest();

        if ($request->has('department') && $request->department !== '') {
            $query->where('department', $request->department);
        }

        $notices = $query->paginate(10);

        return view('notices.index', compact('notices'));
    }

    public function create()
    {
        return view('notices.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'department' => 'required|string|in:Computer Science,Information Technology,Electronics,Electrical,Mechanical,Civil',
            'file' => 'nullable|file|max:10240', // 10MB max
        ]);

        $notice = new Notice();
        $notice->title = $validated['title'];
        $notice->message = $validated['message'];
        $notice->department = $validated['department'];
        $notice->user_id = auth()->id();

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('notices', 'public');
            $notice->file_path = $path;
        }

        $notice->save();

        return redirect()->route('notices.index')
            ->with('success', 'Notice posted successfully.');
    }

    public function show(Notice $notice)
    {
        $user = auth()->user();
        if ($user->isStudent() && $notice->department !== $user->department) {
            abort(403);
        }
        return view('notices.show', compact('notice'));
    }

    public function edit(Notice $notice)
    {
        return view('notices.edit', compact('notice'));
    }

    public function update(Request $request, Notice $notice)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'department' => 'required|string',
            'file' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4|max:10240'
        ]);

        if ($request->hasFile('file')) {
            if ($notice->file_path) {
                Storage::disk('public')->delete($notice->file_path);
            }
            $filePath = $request->file('file')->store('notices', 'public');
            $validated['file_path'] = $filePath;
        }

        $notice->update($validated);

        return redirect()->route('notices.index')
            ->with('success', 'Notice updated successfully.');
    }

    public function destroy(Notice $notice)
    {
        if ($notice->file_path) {
            Storage::disk('public')->delete($notice->file_path);
        }
        $notice->delete();

        return redirect()->route('notices.index')
            ->with('success', 'Notice deleted successfully.');
    }
} 