<?php
/**
 * You are allowed to use this API in your web application.
 *
 * Copyright (C) 2018 by customweb GmbH
 *
 * This program is licenced under the customweb software licence. With the
 * purchase or the installation of the software in your application you
 * accept the licence agreement. The allowed usage is outlined in the
 * customweb software licence which can be found under
 * http://www.sellxed.com/en/software-license-agreement
 *
 * Any modification or distribution is strictly forbidden. The license
 * grants you the installation in one application. For multiuse you will need
 * to purchase further licences at http://www.sellxed.com/shop.
 *
 * See the customweb software licence agreement for more details.
 *
 *
 * @category	Customweb
 * @package		Customweb_TeleCashCw
 * 
 */

namespace Customweb\TeleCashCw\Block\Checkout;

class AbstractCheckout extends \Magento\Framework\View\Element\Template
{
	/**
	 * @var \Customweb\TeleCashCw\Model\Authorization\Transaction
	 */
	private $transaction;

	/**
	 * @var \Customweb\TeleCashCw\Model\Authorization\Method\AbstractMethod
	 */
	private $authorizationAdapter;

	/**
	 * @param \Customweb\TeleCashCw\Model\Authorization\Transaction $transaction
	 * @return \Customweb\TeleCashCw\Block\Checkout\AbstractCheckout
	 */
	public function setTransaction(\Customweb\TeleCashCw\Model\Authorization\Transaction $transaction)
	{
		$this->transaction = $transaction;
		return $this;
	}

	/**
	 * @throws \Exception
	 * @return \Customweb\TeleCashCw\Model\Authorization\Transaction
	 */
	public function getTransaction()
	{
		if (!($this->transaction instanceof \Customweb\TeleCashCw\Model\Authorization\Transaction)) {
			throw new \Exception("The transaction has not been set.");
		}
		return $this->transaction;
	}

	/**
	 * @param \Customweb\TeleCashCw\Model\Authorization\Method\AbstractMethod $adapter
	 * @return \Customweb\TeleCashCw\Block\Checkout\AbstractCheckout
	 */
	public function setAuthorizationAdapter(\Customweb\TeleCashCw\Model\Authorization\Method\AbstractMethod $adapter)
	{
		$this->authorizationAdapter = $adapter;
		return $this;
	}

	/**
	 * @throws \Exception
	 * @return \Customweb\TeleCashCw\Model\Authorization\Method\AbstractMethod
	 */
	public function getAuthorizationAdapter()
	{
		if (!($this->authorizationAdapter instanceof \Customweb\TeleCashCw\Model\Authorization\Method\AbstractMethod)) {
			throw new \Exception("The authorization adapter has not been set.");
		}
		return $this->authorizationAdapter;
	}
}