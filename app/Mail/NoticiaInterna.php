<?php

namespace App\Mail;

use App\Models\Admin\Noticia;
 
use Illuminate\Mail\Mailable;

class NoticiaInterna extends Mailable
{

    /**
     * The order instance.
     *
     * @var Order
     */
    protected $noticia;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Noticia $noticia)
    {
        $this->noticia = $noticia;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         
        return $this->view('emails.noticias.interna')
                    ->with([
                        'noti' => $this->noticia
                    ]);
    }
}