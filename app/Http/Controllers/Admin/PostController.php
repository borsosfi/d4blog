<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.postList', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formAction = route('admin.post.store');
        $formMethod = 'POST';
        $tags = Tag::all();
        return view('admin.post.postCreate', compact('formAction', 'formMethod', 'tags'));
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
            'title' => "required|unique:posts,title|min:5|max:255",
            'excerpt' => 'required|min:10',
            'content' => 'required'
        ]);

        $tags = $this->checkTags($request->input('tags') ?? []);

        $post = new Post($request->all());
        $post->user_id = Auth()->id();
        $post->url = Str::slug($post->title);
        $post->save();

        $post->tags()->sync($tags);

        return redirect()->route('admin.post.index')->with('success', __('Blog entry added successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $formAction = route('admin.post.update', $post);
        $formMethod = 'PUT';
        $postTags = $post->tags->pluck('id')->toArray();
        $tags = Tag::all();
        return view('admin.post.postEdit', compact('post', 'formAction', 'formMethod', 'postTags', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => "required|unique:posts,title,{$post->id}|min:5|max:255",
            'excerpt' => 'required|min:10',
            'content' => 'required'
        ]);

        $tags = $this->checkTags($request->input('tags') ?? []);
        $data = $request->all();
        $data['url'] = Str::slug($request->title);
        $post->update($data);
        $post->tags()->sync($tags);

        return redirect()->route('admin.post.index')->with('success', __('Blog entry updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index')->with('success', __('Blog entry deleted successfully.'));
    }

    /**
     * Check array for new (non-numeric) tag(s) and create it.
     */
    private function checkTags(array $tags): array
    {
        $allTags = [];
        foreach ($tags as $tag) {
            $tagId = $tag;
            if (!is_numeric($tag)) {
                $newTag = Tag::create([
                    'name' => $tag,
                    'url' => Str::slug($tag)
                ]);
                $tagId = $newTag->id;
            }
            $allTags[] = $tagId;
        }
        return $allTags;
    }
}
