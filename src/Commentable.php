<?php

namespace RealRipley\Commentable;

use RealRipley\Commentable\Models\Comment;


trait Commentable
{
    /**
	 * Boot the Commentable trait.
	 *
	 * @return void
	 */
	public static function bootCommentable()
	{
		
	}
	
	public function getComments()
	{
		return $this->morphMany(
			Comment::class, 'commentable'
		)->orderBy('created_at')->get();
    }
    
    public function addComment($content)
    {
		$comment = new Comment();
		$comment->content = $content;
		$comment->commentable_type = get_class($this);
		$comment->commentable_id = $this->id;

		return $comment->save();
    }
    
    public function removeComent($comment_id)
	{
		$comment = Comment::find($comment_id);

		if ($comment) {

			Comment::destroy($comment->id);

			return true;
		}

		return false;
    }
    
    public function updateComment($comment_id, $content)
	{
		$comment = Comment::find($comment_id);

		if ($comment) {
			$comment->content = $content;
			$comment->save();

			return true;
		}

		return false;
	}

	public function getComment($comment_id)
	{
		$comment = Comment::find($comment_id);

		return $comment;
	}

}