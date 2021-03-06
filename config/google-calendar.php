<?php

return [

    /*
     * Path to the json file containing the credentials.
     */
    'service_account_credentials_json' => storage_path('app/google-calendar/service_account_credentials_json.json'),

    /*
     *  The id of the Google Calendar that will be used by default.
     */
    'calendar_id' => env('CALENDARID'),
];
