<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Post;


class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $post = Post::find($id);
        dd($post);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        dd($this->post);
        return $this->view('posts.order')
                    ->with([
                        'title' => $this->posts['title'],
                    ]);
    }
}
