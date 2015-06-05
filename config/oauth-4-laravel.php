<?php
    return array( 

        /*
        |--------------------------------------------------------------------------
        | oAuth Config
        |--------------------------------------------------------------------------
        */

        /**
         * Storage
         */
        'storage' => 'Session', 

        /**
         * Consumers
         */
        'consumers' => array(

            /**
             * Facebook
             */
            'Facebook' => array(
                'client_id'     => '1629969347238467',
                'client_secret' => 'ec12b0b9a46d34681a510cdd36558a73',
                'scope'         => array('email'),
            ),      
                  )

    );