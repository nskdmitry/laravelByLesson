<?php
/**
 * Created by PhpStorm.
 * User: amazing
 * Date: 27.07.17
 * Time: 8:57
 */

namespace App\Billing;


class Stripe
{
    protected $secret;

    public function __construct($key)
    {
        $this->secret = $key;
    }
}