<?php

namespace App\Mail;

use App\Models\Admin\Producto;
use App\Models\Front\Pedido;

use Illuminate\Mail\Mailable;

class PedidoSend extends Mailable
{

    protected $pedido;

    public function __construct($pedido)

    {

        $this->pedido = $pedido;
        //$this->file = $file;

    }

    public function build()

    {
        $pedido_full = Pedido::detalle($this->pedido);
        //dd($pedido_full->get('nombre'));
        return $this->view('emails.pago_seguro.pedido')
                    ->with(['pedido' => $pedido_full ])
                    //->attach($this->file)
                    ->subject('Pedido Promin.mx');

    }

}