<?php

namespace Modules\Blog\Services;

use InvalidArgumentException;
use Validator;

use Modules\Blog\Entities\Post;

class PostService
{
	public function getAll()
    {
        return Post::all();
    }

    public function get($url)
    {
        return Post::whereUrl($url)->first();
    }
    
    public function add(array $data)
	{
		$validator = $this->validator($data);

		if($validator->fails()){
			throw new InvalidArgumentException($validator->errors()->first());
		}
		
		$post = new Post;
		$post->title = $data['title'];
		$post->content = $data['content'];
		$post->url = $data['url'];
		$post->save();

		return $post->fresh();
	}


	protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|min:3|max:255',
			'content' => 'required|string',
			'url' => 'required|string|min:3|max:255',
        ]);
    }
}