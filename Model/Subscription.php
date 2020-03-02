<?php
namespace Ittweb\Newsletter\Model;
use Ittweb\Newsletter\Api\SubscriptionInterface;

class Subscription implements SubscriptionInterface
{
    protected $subscriberFactory;

    public function __construct(\Magento\Newsletter\Model\SubscriberFactory $subscriberFactory)
    {
        $this->subscriberFactory= $subscriberFactory;
    }

    /**
     * Returns user email
     * @param string $email
     * @return void
     */
    public function subscribeByEmail($email)
    {
        $this->subscriberFactory->create()->subscribe($email);
    }
}
