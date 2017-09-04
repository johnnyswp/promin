<?php

return array(
    /** set your paypal credential **/
    'client_id' =>'Adh0kJr1PH9rdGBB1FwXVrxdiySXvktbMa_opJibDTvuMWeYd0_o5uqITS04rIoNpKDJYDwJQRemlvJe',
    'secret' => 'EDOnUEhl0-R2mTZZSxbkrVEP1Q2vD8SakHFfGrWigXEoQchgXeG9uhPsHUoqJb0PHPls1UEFN1CmVJuW',
    /**
    * SDK configuration 
    */
    'settings' => array(
    /**
    * Available option 'sandbox' or 'live'
    */
    'mode' => 'sandbox',
    /**
    * Specify the max request time in seconds
    */
    'http.ConnectionTimeOut' => 1000,
    /**
    * Whether want to log to a file
    */
    'log.LogEnabled' => true,
    /**
    * Specify the file that want to write on
    */
    'log.FileName' => storage_path() . '/logs/paypal.log',
    /**
    * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
    *
    * Logging is most verbose in the 'FINE' level and decreases as you
    * proceed towards ERROR
    */
    'log.LogLevel' => 'FINE'
    ),
);