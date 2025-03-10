<?php

namespace App\Http\Controllers;

use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

  
    public function index()
    {
        $tags = $this->tagService->getAllTags();
        return view('tags.index', compact('tags'));
    }
    


    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $this->tagService->createTag($request->all());
        return redirect()->route('tags.index');
    }

    public function edit($id)
    {
        $tag = $this->tagService->getTagById($id);
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $this->tagService->updateTag($id, $request->all());
        return redirect()->route('tags.index');
    }

    public function destroy($id)
    {
        $this->tagService->deleteTag($id);
        return redirect()->route('tags.index');
    }
}
