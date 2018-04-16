<?php
namespace Kroschke\Debit\Plugin\Order\Adminhtml\Block;


class Payment
{
    public function afterSetPayment($subject, $result) {

        $info = $subject->getChildBlock('info');

        if ($info) {
            $info->setTemplate('Kroschke_Debit::info.phtml');
        }
    }
}