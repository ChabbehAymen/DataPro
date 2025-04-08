<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function __construct(protected TagService $tagService)
    {}

    public function index(Request $request)
    {
        $tags = $this->tagService->all();
        if(str_contains($request->path(), 'admin')){
            $tags = $tags->pagination(5);
            return view('tags.index', compact('tags'));
        }
        return response()->json($tags);
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(TagRequest $request)
    {
        $this->tagService->create($request);
        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }


    public function edit($id)
    {
        $tag = $this->tagService->find($id);
        return view('tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, $id)
    {
        $result = $this->tagService->update($id, $request);

        if ($result) {
            return redirect()->route('tags.index')->with('success', 'Tag updated successfully.');
        }

        return redirect()->route('tags.index')->with('error', 'Tag not found.');
    }


    public function destroy($id)
    {
        $this->tagService->delete($id);
        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully.');
    }
}
