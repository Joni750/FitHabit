<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Lineas de Idioma para Validación
    |--------------------------------------------------------------------------
    |
    | Las siguientes líneas de idioma contienen los mensajes de error predeterminados utilizados por
    | la clase validadora. Algunas de estas reglas tienen varias versiones, como
    | las reglas de tamaño. Siéntete libre de ajustar cada uno de estos mensajes aquí.
    |
    */

    'accepted'             => 'Kampoaren :attribute balioa onartua izan behar da.',
    'active_url'           => ':attribute kampoa ez da URL baliagarria.',
    'after'                => ':attribute kampoak :date baino beranduagoa izan behar du.',
    'after_or_equal'       => ':attribute kampoak :date baino beranduagoa edo berdin izan behar du.',
    'alpha'                => ':attribute kampoak hizkiak bakarrik eduki ditzake.',
    'alpha_dash'           => ':attribute kampoak hizkiak, zenbakiak, marrak eta azpimarrak bakarrik eduki ditzake.',
    'alpha_num'            => ':attribute kampoak hizkiak eta zenbakiak bakarrik eduki ditzake.',
    'array'                => ':attribute kampoak bilduma izan behar du.',
    'before'               => ':attribute kampoak :date baino lehenagokoa izan behar du.',
    'before_or_equal'      => ':attribute kampoak :date baino lehenagokoa edo berdin izan behar du.',
    'between'              => [
        'numeric' => ':attribute kampoak :min eta :max arteko balioa izan behar du.',
        'file'    => ':attribute fitxategiak :min eta :max kilobyte arteko pisua izan behar du.',
        'string'  => ':attribute kampoak :min eta :max karaktere arteko luzera izan behar du.',
        'array'   => ':attribute kampoak :min eta :max arteko elementu kopurua izan behar du.',
    ],
    'boolean'              => ':attribute kampoak benetan edo gezurra izan behar du.',
    'confirmed'            => ':attribute kampoaren baieztapena ez dator bat.',
    'date'                 => ':attribute kampoak data baliagarri bat izan behar du.',
    'date_equals'          => ':attribute kampoak :date data izan behar du.',
    'date_format'          => ':attribute kampoak :format formatua izan behar du.',
    'different'            => ':attribute kampoak eta :other kampoak desberdinak izan behar dira.',
    'digits'               => ':attribute kampoak :digits digitu izan behar ditu.',
    'digits_between'       => ':attribute kampoak :min eta :max arteko digitu kopurua izan behar du.',
    'dimensions'           => ':attribute kampoak irudiaren tamaina baliogabeak ditu.',
    'distinct'             => ':attribute kampoak balio bikoiztua du.',
    'email'                => ':attribute kampoak helbide elektroniko baliagarria izan behar du.',
    'ends_with'            => ':attribute kampoak honekin amaitu behar da: :values',
    'exists'               => 'Hautatutako :attribute kampoak ez da existitzen.',
    'file'                 => ':attribute kampoak fitxategi izan behar du.',
    'filled'               => ':attribute kampoak balioa izan behar du.',
    'gt'                   => [
        'numeric' => ':attribute kampoak :value baino handiagoa izan behar du.',
        'file'    => ':attribute fitxategiak :value kilobyte baino handiagoa izan behar du.',
        'string'  => ':attribute kampoak :value karaktere baino handiagoa izan behar du.',
        'array'   => ':attribute kampoak :value elementu baino handiagoa izan behar du.',
    ],
    'gte'                  => [
        'numeric' => ':attribute kampoak :value baino handiagoa edo berdina izan behar du.',
        'file'    => ':attribute fitxategiak :value kilobyte baino handiagoa edo berdina izan behar du.',
        'string'  => ':attribute kampoak :value karaktere baino handiagoa edo berdina izan behar du.',
        'array'   => ':attribute kampoak :value elementu baino handiagoa edo berdina izan behar du.',
    ],
    'image'                => ':attribute kampoak irudi izan behar du.',
    'in'                   => 'Hautatutako :attribute kampoak baliogabea da.',
    'in_array'             => ':attribute kampoa ez dago :other-en.',
    'integer'              => ':attribute kampoak zenbaki osoa izan behar du.',
    'ip'                   => ':attribute kampoak baliozko IP helbidea izan behar du.',
    'ipv4'                 => ':attribute kampoak baliozko IPv4 helbidea izan behar du.',
    'ipv6'                 => ':attribute kampoak baliozko IPv6 helbidea izan behar du.',
    'json'                 => ':attribute kampoak baliozko JSON katea izan behar du.',
    'lt'                   => [
        'numeric' => ':attribute kampoak :value baino txikiagoa izan behar du.',
        'file'    => ':attribute fitxategiak :value kilobyte baino txikiagoa izan behar du.',
        'string'  => ':attribute kampoak :value karaktere baino txikiagoa izan behar du.',
        'array'   => ':attribute kampoak :value elementu baino txikiagoa izan behar du.',
    ],
    'lte'                  => [
        'numeric' => ':attribute kampoak :value baino txikiagoa edo berdina izan behar du.',
        'file'    => ':attribute fitxategiak :value kilobyte baino txikiagoa edo berdina izan behar du.',
        'string'  => ':attribute kampoak :value karaktere baino txikiagoa edo berdina izan behar du.',
        'array'   => ':attribute kampoak :value elementu baino txikiagoa edo berdina izan behar du.',
    ],
    'max'                  => [
        'numeric' => ':attribute kampoak ezin du :max baino handiagoa izan behar.',
        'file'    => ':attribute fitxategiak ezin du :max kilobyte baino handiagoa izan behar.',
        'string'  => ':attribute kampoak ezin du :max karaktere baino gehiago izan behar.',
        'array'   => ':attribute kampoak ezin du :max elementu baino gehiago izan behar.',
    ],
    'mimes'                => ':attribute kampoak :values motako fitxategi izan behar du.',
    'mimetypes'            => ':attribute kampoak :values motako fitxategi izan behar du.',
    'min'                  => [
        'numeric' => ':attribute kampoak gutxienez :min izan behar du.',
        'file'    => ':attribute fitxategiak gutxienez :min kilobyte izan behar du.',
        'string'  => ':attribute kampoak gutxienez :min karaktere izan behar du.',
        'array'   => ':attribute kampoak gutxienez :min elementu izan behar du.',
    ],
    'not_in'               => 'Hautatutako :attribute kampoak baliogabea da.',
    'not_regex'            => ':attribute kampoaren formatua baliogabea da.',
    'numeric'              => ':attribute kampoak zenbaki bat izan behar du.',
    'password'             => 'Pasahitza okerra da.',
    'present'              => ':attribute kampoak egon behar da.',
    'regex'                => ':attribute kampoaren formatua baliogabea da.',
    'required'             => ':attribute kampoak beharrezkoa da.',
    'required_if'          => ':attribute kampoak beharrezkoa da :other :value denean.',
    'required_unless'      => ':attribute kampoak beharrezkoa da :other :values-en egon ez denean.',
    'required_with'        => ':attribute kampoak beharrezkoa da :values egon denean.',
    'required_with_all'    => ':attribute kampoak beharrezkoa da :values guztiak egon denean.',
    'required_without'     => ':attribute kampoak beharrezkoa da :values ez dagoenean.',
    'required_without_all' => ':attribute kampoak beharrezkoa da :values guztiak ez dagoenean.',
    'same'                 => ':attribute kampoak eta :other kampoak bat datoz.',
    'size'                 => [
        'numeric' => ':attribute kampoak :size izan behar du.',
        'file'    => ':attribute fitxategiak :size kilobyte izan behar du.',
        'string'  => ':attribute kampoak :size karaktere izan behar du.',
        'array'   => ':attribute kampoak :size elementu izan behar du.',
    ],
    'starts_with'          => ':attribute kampoak honetatik hasi behar da: :values',
    'string'               => ':attribute kampoak karaktere katea izan behar du.',
    'timezone'             => ':attribute kampoak baliozko ordu-eremua izan behar du.',
    'unique'               => ':attribute kampoaren balioa jada erabilita dago.',
    'uploaded'             => ':attribute kampoaren igotzea ez da lortu.',
    'url'                  => ':attribute kampoaren formatua baliogabea da.',
    'uuid'                 => ':attribute kampoak baliozko UUID izan behar du.',

    /*
    |--------------------------------------------------------------------------
    | Lineas de Idioma Personalizadas para Validación
    |--------------------------------------------------------------------------
    |
    | Hemen zehaztu dezakezu atributu bakoitzarentzako mezuak erabiliz
    | "atributua.araua" ereduarekin. Hau erraza egiten digu atributu batetarako
    | mezu berezi bat zehaztea.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'mezua-erabilgarria',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Atributu Pertsonalizatuaren Idioma Lineak
    |--------------------------------------------------------------------------
    |
    | Ondorengo hizkuntza lerroak atributuaren tokia berreskuratzeko erabiliko
    | dira, hau da, "email" ordez "E-posta helbidea" erabiltzeko. Hau egiten
    | dugu mezuak pixka bat garbiago sortu ahal izateko.
    |
    */

    'attributes' => [],

];
