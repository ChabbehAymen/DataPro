<?php

namespace App\Http\Controllers;

use App\Services\TagService;
use Illuminate\Http\Request;
use App\HTTP\Requests\TagRequest;

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

    public function store(TagRequest $request)
    {
        $this->tagService->createTag($request->validated());
    
        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }
    

    public function edit($id)
    {
        $tag = $this->tagService->getTagById($id);
        return view('tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, $id)
    {
        $result = $this->tagService->updateTag($id, $request->validated());
    
        if ($result) {
            return redirect()->route('tags.index')->with('success', 'Tag updated successfully.');
        }
    
        return redirect()->route('tags.index')->with('error', 'Tag not found.');
    }
    

    public function destroy($id)
    {
        $this->tagService->deleteTag($id);
        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully.');
    }
}
