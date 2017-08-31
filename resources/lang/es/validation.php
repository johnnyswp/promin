<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | El following language lines contain El default error messages used by
    | El validator class. Some of Else rules have multiple versions such
    | such as El size rules. Feel free to tweak each of Else messages.
    |
    */

    "accepted"         => "El campo :attribute debe ser aceptado.",
    "active_url"       => "El campo :attribute no es una URL valida.",
    "after"            => "El campo :attribute debe ser después de :date.",
    "alpha"            => "El campo :attribute solo puede contener letras.",
    "alpha_dash"       => "El campo :attribute solo puede contener letras, números o -.",
    "alpha_num"        => "El campo :attribute solo puede contener letras y números.",
    "array"            => "El campo :attribute debe ser un arreglo.",
    "before"           => "El campo :attribute debe ser antes de :date.",
    "between"          => array(
        "numeric" => "El campo :attribute debe ser entre :min - :max.",
        "file"    => "El campo :attribute debe ser entre :min - :max kilobytes.",
        "string"  => "El campo :attribute debe ser entre :min - :max caracteres.",
        "array"   => "El campo :attribute must have entre :min - :max elementos.",
    ),
    "confirmed"        => "El campo :attribute confirmación no es igual.",
    "date"             => "El campo :attribute no es una fecha validad.",
    "date_format"      => "El campo :attribute no es igual al formato :format.",
    "different"        => "El campo :attribute y :oElr debe ser diferente.",
    "digits"           => "El campo :attribute debe ser :digits digitos.",
    "digits_between"   => "El campo :attribute debe ser entre :min y :max digitos.",
    "email"            => "El campo :attribute tiene un formato invalido.",
    "exists"           => "El selected :attribute es invalido.",
    "image"            => "El campo :attribute debe ser una imagen.",
    "in"               => "El selected :attribute es invalido.",
    "integer"          => "El campo :attribute debe ser un entero.",
    "ip"               => "El campo :attribute debe ser a valid IP address.",
    "max"              => array(
        "numeric" => "El campo :attribute no debe ser mayor que :max.",
        "file"    => "El campo :attribute no debe ser mayor que :max kilobytes.",
        "string"  => "El campo :attribute no debe ser mayor que :max caracteres.",
        "array"   => "El campo :attribute no puede tener más de :max elementos.",
    ),
    "mimes"            => "El campo :attribute debe ser un archivo type: :values.",
    "min"              => array(
        "numeric" => "El campo :attribute debe ser al menos :min.",
        "file"    => "El campo :attribute debe ser al menos :min kilobytes.",
        "string"  => "El campo :attribute debe ser al menos :min caracteres.",
        "array"   => "El campo :attribute debe tener al menos :min elementos.",
    ),
    "not_in"           => "El selected :attribute es invalido.",
    "numeric"          => "El campo :attribute debe ser un número.",
    "regex"            => "El campo :attribute tiene un formato invalido.",
    "required"         => "El campo :attribute es requerido.",
    "required_if"      => "El campo :attribute es requerido cuando :oElr es :value.",
    "required_with"    => "El campo :attribute es requerido cuando :values está presente.",
    "required_without" => "El campo :attribute es requerido cuando :values no está presente.",
    "same"             => "El campo :attribute y :oElr deben ser iguales.",
    "size"             => array(
        "numeric" => "El campo :attribute debe ser :size.",
        "file"    => "El campo :attribute debe ser :size kilobytes.",
        "string"  => "El campo :attribute debe ser :size caracteres.",
        "array"   => "El campo :attribute debe contener :size elementos.",
    ),
    "unique"           => "El campo :attribute esta actualmente tomado.",
    "url"              => "El campo :attribute tiene un formato invalido.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using El
    | convention "attribute.rule" to name El lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */
    'custom' => array(
        'attribute-name' => array(
            'rule-name' => 'custom-message',
        ),
    ),

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => array(
        'marcas_id'              => 'Marca',
        'modelo_id'              => 'Modelo',
        'serie'              => 'Serie',
        'nFact'              => 'No. Factura',
        'nPedi'              => 'No. Pedido',
        'asesor_id'              => 'Asesor',

        //Input @AriasC90
        'title'=>'Titulo',
        'content'=>'Contenido',
        'title'=>'Titulo',
        'titulo_banner'=>'Titulo',
        'link_imagen'=> 'Link',
        'razon_social'=>'Nombre o Razón Social',
        'rfc'=>'R.F.C',
        'cp'=>'C.P.',
        'calle'=>'Calle',
        'n_ext'=>'No. Ext',
        'n_int'=>'No. Int',
        'colonia'=>'Colonia',
        'municipio'=>'Delegación / Municipio',
        'estado'=>'Estado',
        'pais'=>'País',
        
        'cp_2'=>'* C.P.',
        'calle_2'=>'Calle',
        'n_ext_2'=>'No. Ext',
        'n_int_2'=>'No. Int',
        'colonia_2'=>'Colonia',
        'municipio_2'=>'Delegación / Municipio',
        'estado_2'=>'Estado',
        'pais_2'=>'País',
        'parental_name'=>'Apellido Materno',
        'name'=>'Nombre',
        'last_name'=>'Apellido Paterno',
        'password'=>'Contraseña',
        'picture'=>'imagen',
        'galeria'=>'galería',
        'state'=>'se publica',
        'keywork'=>'palabras clave',
        'priceVenta'=>'precio de venta',
        'linea_negocio_id' => 'linea negocio',
        'tipo_producto_id' => 'tipo producto',
        'marcas_id' => 'marcas',
        'modelo_id' => 'modelo',
        'codigo' => 'código'
        ),

);
