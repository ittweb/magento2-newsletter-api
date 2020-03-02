<?php
namespace Ittweb\Newsletter\Api;

interface SubscriptionInterface
{
    /**
     * POST for Newsletter api
     * @param string $email
     * @return void
     */
    public function subscribeByEmail($email);
}
