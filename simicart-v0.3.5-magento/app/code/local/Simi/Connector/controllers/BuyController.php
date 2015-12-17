<?php

/**
 * Magestore
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the Magestore.com license that is
 * available through the world-wide-web at this URL:
 * http://www.magestore.com/license-agreement.html
 * 
 * DISCLAIMER
 * 
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 * 
 * @category 	Simi
 * @package 	Simi_Connector
 * @copyright 	Copyright (c) 2012 Magestore (http://www.magestore.com/)
 * @license 	http://www.magestore.com/license-agreement.html
 */

/**
 * Mconnect Index Controller
 * 
 * @category 	Simi
 * @package 	Simi_Connector
 * @author  	Simi Developer
 */
class Simi_Connector_BuyController extends Simi_Connector_Controller_Action {
	public function superiorAction(){
		$information = Mage::getModel('connector/simicart_customize')->buySuperior();
        $this->_printDataJson($information);
	}

	public function zaraAction(){
		$information = Mage::getModel('connector/simicart_customize')->buyZara();
        $this->_printDataJson($information);
	}

	public function ultimateAction(){
		$information = Mage::getModel('connector/simicart_customize')->buyUltimate();
        $this->_printDataJson($information);
	}

	public function liteAction(){
		$information = Mage::getModel('connector/simicart_customize')->buyLite();
        $this->_printDataJson($information);
	}

	public function freeAction(){
		$information = Mage::getModel('connector/simicart_customize')->buyLite();
        $this->_printDataJson($information);
	}


	public function upgradeLiteAction(){
		$information = Mage::getModel('connector/simicart_customize')->upgradeLite();
        $this->_printDataJson($information);
	}
	public function upgradeUltimateAction(){
		$information = Mage::getModel('connector/simicart_customize')->upgradeUltimate();
        $this->_printDataJson($information);
	}
	public function upgradeSuperiorAction(){
		//die('xxxx');
		$information = Mage::getModel('connector/simicart_customize')->upgradeSuperior();
        $this->_printDataJson($information);
	}


}