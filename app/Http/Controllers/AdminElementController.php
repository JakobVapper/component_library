<?php

namespace App\Http\Controllers;

use App\Models\Element;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminElementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $elements = Element::with(['post', 'user'])->latest()->paginate(15);
        return view('admin.elements.index', compact('elements'));
    }

    public function create()
    {
        // Get all posts for the dropdown
        $posts = Post::all();
        return view('admin.elements.create', compact('posts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'code' => 'required|string',
        ]);

        $element = new Element();
        $element->post_id = $validated['post_id'];
        $element->user_id = auth()->id();
        $element->name = $validated['name'];
        $element->content = $validated['content'];
        $element->code = $validated['code'];
        $element->save();

        return redirect()->route('admin.elements.index')->with('success', 'Element created successfully!');
    }

    public function show(Element $element)
    {
        return view('admin.elements.show', compact('element'));
    }

    public function edit(Element $element)
    {
        // Get all posts for the dropdown
        $posts = Post::all();
        return view('admin.elements.edit', compact('element', 'posts'));
    }

    public function update(Request $request, Element $element)
    {
        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'name' => 'required|string|max:255',
            'content' => 'required|string', 
            'code' => 'required|string',
        ]);

        $element->update($validated);

        return redirect()->route('admin.elements.index')->with('success', 'Element updated successfully!');
    }

    public function destroy(Element $element)
    {
        $element->delete();
        return redirect()->route('admin.elements.index')->with('success', 'Element deleted successfully!');
    }
}