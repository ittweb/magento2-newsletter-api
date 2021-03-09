# magento2-newsletter-api
This M2 module creates an API ENDPOINT that enables to subscribe to the Magento 2 newsletter.

Go to your M2 root directory, then you can choose to install it manually or through composer.

## Install with Composer:
```
composer config repositories.ittweb vcs https://github.com/ittweb/magento2-newsletter-api
composer require ittweb/newsletter:dev-master
php bin/magento setup:upgrade
php bin/magento c:f
```

## Install manually:
```
cd app/code
mkdir Ittweb/Newsletter
git clone https://github.com/ittweb/magento2-newsletter-api.git
cd ../..
php bin/magento setup:upgrade
php bin/magento c:f
```

## API endpoint
All the following methods are available through this URL `/V1/newsletter/subscription/:email`:
- (GET) Check if user is subscribed
- (POST) Add a user subscription
- (DELETE) Unsubscribe a user

## Magento 1 version
This module is available also for Magento 1, always on [Github](https://github.com/ittweb/vsfapi-magento1-newsletter).
