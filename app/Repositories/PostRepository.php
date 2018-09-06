<?php

namespace App\Repositories;

use App\Customer\Models\Post;
use DB;
use App\Contracts\PostInterface;

class PostRepository implements PostInterface
{
	public $post;

	public function __construct(Post $post)
	{
		$this->post = $post;
	}

	public function getAllPosts()
	{
		return $this->post->all();
	}

	public function getPostDataById($id)
	{
		return $this->post->find($id);
	}

	public function createPosts($request)
	{
		return $this->post->create($request->all());
	}

	public function updatePosts($id, $request)
	{
		return $this->post->find($id)->update([

			'user_id' => $request->user_id,
			'name' => $request->name,
			'body' => $request->body

		]);
	}

	public function deletePosts($id)
	{
		return $this->post->find($id)->delete();
	}
}