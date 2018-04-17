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

namespace Customweb\TeleCashCw\Model\Config\Source\Klarnaopeninvoice;

class Currency implements \Magento\Framework\Option\ArrayInterface
{
	/**
	 * @return array
	 */
	public function toOptionArray()
	{
		return [
			['value' => 'EUR', 'label' => __('Euro (EUR)')],
			['value' => 'DKK', 'label' => __('Danish krone (DKK)')],
			['value' => 'NOK', 'label' => __('Norwegian krone (NOK)')],
			['value' => 'SEK', 'label' => __('Swedish krona (SEK)')],
		];
	}
}
