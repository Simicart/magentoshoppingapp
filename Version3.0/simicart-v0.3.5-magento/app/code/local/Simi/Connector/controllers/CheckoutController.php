<?php
/**
 * 
 * DISCLAIMER
 * 
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 * 
 * @category    
 * @package     Connector
 * @copyright   Copyright (c) 2012 
 * @license     
 */

/**
 * Checkout Controller
 * 
 * @category    
 * @package     Connector
 * @author      Developer
 */
class Simi_Connector_CheckoutController extends Simi_Connector_Controller_Action {

    public function add_to_cartAction() {
        $data = $this->getData();
        $information = Mage::getModel('connector/checkout_cart')->addCart($data);
        $this->_printDataJson($information);
    }

    public function edit_cartAction() {
        $data = $this->getData();        
        $information = Mage::getModel('connector/checkout_cart')->updateCart($data);
        $this->_printDataJson($information);
    }

    public function get_allowed_countriesAction() {
        $information = Mage::getModel('connector/checkout_country')->getAllowedCountries();
        $this->_printDataJson($information);
    }

//    public function get_country_configAction() {
//        $information = Mage::getModel('connector/checkout_country')->getDefaultCountry();
//        $this->_printDataJson($information);
//    }

    public function get_currency_symbolAction() {
        $information = Mage::getModel('connector/checkout_country')->getCurrencySymbol();
        $this->_printDataJson($information);
    }

    public function get_statesAction() {
        $data = $this->getData();
        $information = Mage::getModel('connector/checkout_country')->getStates($data);
        $this->_printDataJson($information);
    }

    public function get_order_configAction() {
        $data = $this->getData();
        $information = Mage::getModel('connector/checkout')->getOrderConfig($data);
        $this->_printDataJson($information);
    }

    public function save_shipping_methodAction() {
        $data = $this->getData();
        $information = Mage::getModel('connector/checkout_shipping')->saveShippingMethod($data);
        $this->_printDataJson($information);
    }

    public function place_orderAction() {
        $data = $this->getData();
        $checkoutModel = Mage::getSingleton('connector/checkout');
        $message = $checkoutModel->indexPlace();
        if ($message) {
            $information = $checkoutModel->statusError(array($message));
//            $checkoutModel->cleanSession();
            $this->_printDataJson($information);
            return;
        }

        $check_cart = Mage::getModel('connector/checkout_payment')->savePaymentMethod($data);
        if ($check_cart == 'Exception') {
            $information = $checkoutModel->statusError(Mage::getSingleton('core/session')->getErrorPayment());
            $this->_printDataJson($information);
            return;
        }
        $information = $checkoutModel->saveOrder($check_cart, $data);
        $this->_printDataJson($information);
    }

    public function update_paypal_paymentAction() {
        $data = $this->getData();
//        $information = Mage::getModel('connector/checkout_payment')->updatePaypalPayment($data);
//        $this->_printDataJson($information);
    }
    
    public function set_couponAction(){
        $data = $this->getData();
        $information = Mage::getModel('connector/checkout_cart')->setCouponCode($data);
        $this->_printDataJson($information);
    }

    //hainh
    public function re_orderAction() {
        $data = $this->getData();
        $information = Mage::getModel('connector/checkout')->reOrder($data);
        $this->_printDataJson($information);
    }

    public function save_payment_methodAction() {
        $data = $this->getData();
        $information = Mage::getModel('connector/checkout_payment')->saveCheckoutPaymentMethod($data);
        $this->_printDataJson($information);
    }
	
	public function cancel_orderAction() {
		$data = $this->getData();
		$oder_id=$data->order_id;
		$information = Mage::getModel('connector/checkout')->cancelOrder($oder_id);
		$this->_printDataJson($information);
	}
}