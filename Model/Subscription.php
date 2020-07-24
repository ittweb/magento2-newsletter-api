<?php
namespace Ittweb\Newsletter\Model;
use Ittweb\Newsletter\Api\SubscriptionInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class Subscription implements SubscriptionInterface
{
    protected $subscriberFactory;

    public function __construct(
        \Magento\Newsletter\Model\SubscriberFactory $subscriberFactory,
        \Magento\Customer\Model\CustomerFactory $customer,
        \Magento\Store\Model\StoreManagerInterface $storemanager)
    {
        $this->subscriberFactory = $subscriberFactory;
        $this->customer = $customer;
        $this->storemanager = $storemanager;
    }

    /**
     * Returns user email
     * @param string $email
     * @return void
     */
    public function subscribeByEmail($email)
    {
        $websiteId = $this->storemanager->getStore()->getWebsiteId();
        $customerId = $this->customer->create()->setWebsiteId($websiteId)->loadByEmail($email)->getId();
        if ($customerId) {
            $this->subscriberFactory->create()->subscribeCustomerById($customerId);
        } else {
            $this->subscriberFactory->create()->subscribe($email);
        }
    }

    /**
     * @param string $email
     * @return void
     */
    public function isSubscribed($email)
    {
        if (!$this->subscriberFactory->create()->loadByEmail($email)->isSubscribed()) {
            throw new NoSuchEntityException(__('Email not subscribed'));
        }
    }

    /**
     * @param string $email
     * @return void
     */
    public function deleteByEmail($email)
    {
        $websiteId = $this->storemanager->getStore()->getWebsiteId();
        $customerId = $this->customer->create()->setWebsiteId($websiteId)->loadByEmail($email)->getId();
        $this->subscriberFactory->create()->unsubscribeCustomerById($customerId);
    }
}
