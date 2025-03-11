<?php

// app/Http/Controllers/TagController.php
namespace App\Http\Controllers;

use App\Repositories\TagRepository;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    protected $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function index()
    {
        $tags = $this->tagRepository->all();
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

        $this->tagRepository->create($request->all());

        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }

    public function edit($id)
    {
        $tag = $this->tagRepository->find($id);  // Utilisation de la méthode find() du repository
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $tag = $this->tagRepository->find($id);
        $this->tagRepository->update($tag, $request->all());

        return redirect()->route('tags.index')->with('success', 'Tag updated successfully.');
    }

    public function destroy($id)
    {
        $tag = $this->tagRepository->find($id);
        $this->tagRepository->delete($tag);

        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully.');
    }
}
