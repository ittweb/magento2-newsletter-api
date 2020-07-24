<?php
namespace Ittweb\Newsletter\Api;

interface SubscriptionInterface
{
    /**
     * GET for Newsletter api
     * @param string $email
     * @return void
     */
    public function isSubscribed($email);

    /**
     * POST for Newsletter api
     * @param string $email
     * @return void
     */
    public function subscribeByEmail($email);

    /**
     * DELETE for Newsletter api
     * @param string $email
     * @return void
     */
    public function deleteByEmail($email);
}
