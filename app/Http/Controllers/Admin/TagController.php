<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.tagList', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formAction = route('admin.tag.store');
        $formMethod = 'POST';
        $tags = Tag::all();
        return view('admin.tag.tagCreate', compact('formAction', 'formMethod', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:32|unique:tags,name'
        ]);

        $data = $request->all();
        $data['url'] = Str::slug($request->name);
        Tag::create($data);

        return redirect()->route('admin.tag.index')->with('success', __('Tag added successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $formAction = route('admin.tag.update', $tag);
        $formMethod = 'PUT';
        return view('admin.tag.tagEdit', compact('tag', 'formAction', 'formMethod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => "required|min:3|max:32|unique:tags,name,{$tag->id}"
        ]);

        $data = $request->all();
        $data['url'] = Str::slug($request->name);
        $tag->update($data);

        return redirect()->route('admin.tag.index')->with('success', __('Tag updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tag.index')->with('success', __('Tag deleted successfully.'));
    }
}
