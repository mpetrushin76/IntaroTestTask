<?php

return array(
    
    'user/requests/([0-9]+)' => 'requests/checkRequest/$1',
    'user/requests/toXML' => 'requests/createToXML',
    'user/requests/create' => 'requests/create',
    'user/requests' => 'requests/list',
    'user/auth' => 'user/login',
    'user/register' => 'user/register',
    //'TestTask/([a-zA-Z0-9_\/]{1,}$)' => 'user/user/notFound',
    '^TestTask$' => 'user/user/login',
    
);