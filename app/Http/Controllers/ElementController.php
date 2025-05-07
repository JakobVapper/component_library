<?php

namespace App\Http\Controllers;

use App\Models\Element;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ElementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        $post = Post::where('slug', $request->post)->firstOrFail();
        return view('elements.create', compact('post'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'name' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $element = new Element();
        $element->post_id = $validated['post_id'];
        $element->user_id = auth()->id();
        $element->name = $validated['name'];
        $element->content = $validated['content'];
        $element->save();

        return redirect()->route('blog.show', $element->post->slug)->with('success', 'Element added successfully!');
    }

    public function edit(Element $element)
    {
        // Check if user is authorized to edit this element
        if ($element->user_id !== auth()->id() && !auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        return view('elements.edit', compact('element'));
    }

    public function update(Request $request, Element $element)
    {
        // Check if user is authorized to update
        if ($element->user_id !== auth()->id() && !auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $element->update($validated);

        return redirect()->route('blog.show', $element->post->slug)->with('success', 'Element updated successfully!');
    }

    public function destroy(Element $element)
    {
        // Check if user is authorized to delete
        if ($element->user_id !== auth()->id() && !auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        $postSlug = $element->post->slug;
        $element->delete();

        return redirect()->route('blog.show', $postSlug)->with('success', 'Element deleted successfully!');
    }
}