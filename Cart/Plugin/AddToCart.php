<?php

namespace Dev\Cart\Plugin;

class AddToCart
{
    public function beforeAddProduct(\Magento\Checkout\Model\Cart $subject,$productInfo,$requestInfo = null)
    {
        if(isset($requestInfo['qty']))
        {
            $requestInfo['qty'] *= 2;
        }
        else{
            $request = 1;
            $requestInfo['qty'] = $request * 1;
        }
        return array($productInfo,$requestInfo);
    }
}