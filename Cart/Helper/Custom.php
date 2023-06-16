<?php
namespace Dev\Cart\Helper;
 
class Custom extends \Magento\Framework\App\Helper\AbstractHelper
{
    private $customCookieManager;
 
    private $customCookieMetadataFactory;
 
    public function __construct(
        \Magento\Framework\Stdlib\CookieManagerInterface $customCookieManager,
        \Magento\Framework\Stdlib\Cookie\CookieMetadataFactory $customCookieMetadataFactory)
   {
        $this->customCookieManager = $customCookieManager;
        $this->customCookieMetadataFactory = $customCookieMetadataFactory;
    }
 
    public function setCookie()
    {
        $customCookieMetadata = $this->customCookieMetadataFactory->createPublicCookieMetadata();
        $customCookieMetadata->setDurationOneYear();
        $customCookieMetadata->setPath('/');
        $customCookieMetadata->setHttpOnly(false);
 
        return $this->customCookieManager->setPublicCookie(
            'dev',
            'Cookie_Value',
            $customCookieMetadata
        );
    }
 
    public function getCookie()
    {
        return $this->customCookieManager->getCookie(
            'dev'
        );
    }
}