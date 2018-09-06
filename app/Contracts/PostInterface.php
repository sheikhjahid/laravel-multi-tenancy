<?php

namespace App\Contracts;

interface PostInterface
{
	public function createPosts($request);

	public function getAllPosts();

	public function getPostDataById($id);

	public function updatePosts($id, $request);

	public function deletePosts($id);
}