<?php

return array(
    
    'user/requests/([0-9]+)' => 'requests/checkRequest/$1',
    'user/requests/toXML' => 'requests/createToXML',
    'user/requests/create' => 'requests/create',
    'user/auth' => 'user/login',
    'user/register' => 'user/register',
    'user/requests' => 'requests/list',
    'TestTask' => 'user/user/login',
    
);