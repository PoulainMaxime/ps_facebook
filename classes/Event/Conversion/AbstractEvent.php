<?php

namespace PrestaShop\Module\PrestashopFacebook\Event\Conversion;

use Address;
use Context;
use Country;
use FacebookAds\Object\ServerSide\EventRequest;
use FacebookAds\Object\ServerSide\Gender;
use FacebookAds\Object\ServerSide\UserData;
use Gender as PsGender;
use PrestaShop\Module\PrestashopFacebook\Event\ConversionEventInterface;
use PrestaShop\Module\Ps_facebook\Utility\CustomerInformationUtility;
use State;

abstract class AbstractEvent implements ConversionEventInterface
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var false|string
     */
    protected $pixelId;

    public function __construct(Context $context, $pixelId)
    {
        $this->context = $context;
        $this->pixelId = $pixelId;
    }

    /**
     * @param Context $context
     *
     * @return UserData
     *
     * @throws \PrestaShopDatabaseException
     * @throws \PrestaShopException
     */
    protected function createSdkUserData()
    {
        $customerInformation = CustomerInformationUtility::getCustomerInformationForPixel($this->context->customer);

        $fbp = isset($_COOKIE['_fbp']) ? $_COOKIE['_fbp'] : '';
        $fbc = isset($_COOKIE['_fbc']) ? $_COOKIE['_fbc'] : '';

        $userData = (new UserData())
            ->setFbc($fbc)
            // It is recommended to send Client IP and User Agent for ServerSide API Events.
            ->setClientIpAddress($_SERVER['REMOTE_ADDR'])
            ->setClientUserAgent($_SERVER['HTTP_USER_AGENT'])
            ->setFbp($fbp)
            ->setEmail($customerInformation['email'])
            ->setFirstName($customerInformation['firstname'])
            ->setLastName($customerInformation['lastname'])
            ->setPhone($customerInformation['phone'])
            ->setDateOfBirth($customerInformation['birthday'])
            ->setCity($customerInformation['city'])
            ->setState($customerInformation['stateIso'])
            ->setZipCode($customerInformation['postCode'])
            ->setCountryCode($customerInformation['countryIso'])
            ->setGender($customerInformation['gender']);

        return $userData;
    }

    protected function sendEvents(array $events)
    {
        $request = (new EventRequest($this->pixelId))
            ->setEvents($events);

        try {
            $request->execute();
        } catch (\Exception $e) {
            //todo: need to logg exception
        }
    }
}
