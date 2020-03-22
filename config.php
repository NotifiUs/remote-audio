<?php

return [
    'production' => false,
    'baseUrl' => 'http://localhost:3000',
    'year' => date('Y'),
    # You can also use your own servers instead of a Twilio function
    # 'twilio_capability_url' => 'https://twilio-function-subdomain.twil.io/capability-token',

    # Set in .env
    'twilio_capability_url' => env('TWILIO_CAPABILITY_URL'),
];
