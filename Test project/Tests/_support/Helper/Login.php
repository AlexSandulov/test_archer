<?php

namespace Tests\Codeception\Helper;

class Login
{
    public function getLoginUserInfo()
    {
        return [
            'name' => '', // enter test user email
            'password' => '', // enter test user account password
        ];
    }
}
