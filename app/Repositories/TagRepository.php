<?php

// app/Repositories/TagRepository.php

namespace App\Repositories;

use App\Models\Tag;

class TagRepository
{
    // Get all tags
    public function all()
    {
        return Tag::all();
    }

    // Find a tag by its ID
    public function find($id)
    {
        return Tag::find($id);
    }

    // Create a new tag
    public function create(array $data)
    {
        return Tag::create($data);
    }

    // Update a tag
    public function update($tag, array $data)
    {
        $tag->update($data);
        return $tag;
    }

    // Delete a tag
    public function delete($tag)
    {
        return $tag->delete();
    }
}
