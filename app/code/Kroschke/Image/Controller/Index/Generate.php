<?php

namespace Kroschke\Image\Controller\Index;

use Magento\Framework\App\Action\Context;
use Kroschke\Image\Model\Image;
use  \Magento\Framework\Controller\Result\JsonFactory;

class Generate extends \Magento\Framework\App\Action\Action
{
    /**
     * @var Image
     */
    private $imageGenerator;
    /**
     * @var JsonFactory
     */
    private $resultJsonFactory;

    public function __construct(Context $context, Image $imageGenerator, JsonFactory $jsonFactory)
    {
        parent::__construct($context);
        $this->imageGenerator = $imageGenerator;
        $this->resultJsonFactory = $jsonFactory;
    }


    public function execute()
    {
        //get the post information and validate

        $params = $this->getRequest()->getParams();

        if (!$this->validateParams($params)) {
            //return false
            return $this->resultJsonFactory->create()->setData(
                ['success' => false, 'msg' => 'validation error']
            );
        }

        $params = [
            'color' => 'schwarz',
            'width' => '520',

            'kennzeichen' => 'testkenn',
            'type' => 'euro',

            'text1' => 'te',
            'text2' => 'stk',
            'text3' => 'enn'
        ];
        try {
            $imageLink = $this->imageGenerator->generate($params);
        } catch (\Exception $e) {
            //write to log todo
            return $this->resultJsonFactory->create()->setData(
                ['success' => false, 'msg' => 'error while generating the image']
            );
        }


        return $this->resultJsonFactory->create()->setData([
            'success' => true,
            'image_link' => $imageLink
        ]);
    }

    public function validateParams($params)
    {
        //todo
        return true;
    }
}