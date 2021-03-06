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

namespace Customweb\TeleCashCw\Controller\Adminhtml;

abstract class Transaction extends \Magento\Backend\App\Action
{
	/**
	 * @var \Magento\Framework\Registry
	 */
	protected $_coreRegistry;

	/**
	 * @var \Magento\Framework\View\Result\PageFactory
	 */
	protected $_resultPageFactory;

	/**
	 * @var \Magento\Framework\View\Result\LayoutFactory
	 */
	protected $_resultLayoutFactory;

	/**
	 * @var \Customweb\TeleCashCw\Model\Authorization\TransactionFactory
	 */
	protected $_transactionFactory;

	/**
	 * @param \Magento\Backend\App\Action\Context $context
	 * @param \Magento\Framework\Registry $coreRegistry
	 * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
	 * @param \Magento\Framework\View\Result\LayoutFactory $resultLayoutFactory
	 * @param \Customweb\TeleCashCw\Model\Authorization\TransactionFactory $transactionFactory
	 */
	public function __construct(
			\Magento\Backend\App\Action\Context $context,
			\Magento\Framework\Registry $coreRegistry,
			\Magento\Framework\View\Result\PageFactory $resultPageFactory,
			\Magento\Framework\View\Result\LayoutFactory $resultLayoutFactory,
			\Customweb\TeleCashCw\Model\Authorization\TransactionFactory $transactionFactory
	) {
		parent::__construct($context);
		$this->_coreRegistry = $coreRegistry;
		$this->_resultPageFactory = $resultPageFactory;
		$this->_resultLayoutFactory = $resultLayoutFactory;
		$this->_transactionFactory = $transactionFactory;
	}

	/**
	 * Init layout, menu and breadcrumb
	 *
	 * @return \Magento\Backend\Model\View\Result\Page
	 */
	protected function _initAction()
	{
		$resultPage = $this->_resultPageFactory->create();
		$resultPage->setActiveMenu('Customweb_TeleCashCw::transactions');
		$resultPage->addBreadcrumb(__('Sales'), __('Sales'));
		$resultPage->addBreadcrumb('TeleCash', 'TeleCash');
		$resultPage->addBreadcrumb(__('TeleCash Transactions'), __('TeleCash Transactions'));
		return $resultPage;
	}

	/**
	 * Initialize transaction model instance
	 *
	 * @return \Customweb\TeleCashCw\Model\Authorization\Transaction|false
	 */
	protected function _initTransaction()
	{
		$id = $this->getRequest()->getParam('transaction_id');
		$transaction = $this->_transactionFactory->create()->load($id);

		if (!$transaction->getId()) {
			$this->messageManager->addError(__('This transaction no longer exists.'));
			$this->_actionFlag->set('', self::FLAG_NO_DISPATCH, true);
			return false;
		}
		$this->_coreRegistry->register('telecashcw_transaction', $transaction);
		return $transaction;
	}

	protected function _isAllowed()
	{
		return $this->_authorization->isAllowed('Customweb_TeleCashCw::transactions');
	}
}