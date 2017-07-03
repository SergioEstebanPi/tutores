<?php
return array(
    // set your paypal credential
    //'client_id' => 'AUe0eLturPW6lyIR5f30yj6vBSMc5W8yUDjgTUVZvHEz7L0LxKQZkp8N4YhYKbg3Q_9GgoKM9sww_7HH',
    //'secret' => 'EMhIyY1ftQmlLjxS2tlKczpXkCW9f6699Hhxfz6gWgwWK_O4_vCg4ClzFztGf1bygcJHNvxntDeqnhj_',
    'client_id' => 'ARVr_GyC3Ip8yS_uLy02_B4bhIAQ3V96wu1AloHRiVGuCs0T8ykm5fbYWddd3wY6PtXt4Ei8pBnc-QVd',
    'secret' => 'EMmrnFz2rDHcBjmjkxggTKw8iVyetsS2HZoG_agYneEoU4ouHK_Cfpk1zCkx6WOqC4Val_o_o-7FcJFg',
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
        'http.ConnectionTimeOut' => 30,
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