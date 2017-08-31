<?php

namespace App\Mail;

use App\Models\Admin\Producto;

use Illuminate\Mail\Mailable;

class ProductoSend extends Mailable
{

    protected $producto;

    public function __construct(Producto $producto, $file)

    {

        $this->producto = $producto;
        $this->file = $file;

    }

    public function build()

    {

        return $this->view('emails.producto.producto')
                    ->with(['producto' => $this->producto ])
                    ->attach($this->file)
                    ->subject('Descripción del equipo');

    }

}