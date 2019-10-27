<?php

/*
 * @author     M2E Pro Developers Team
 * @copyright  M2E LTD
 * @license    Commercial use is forbidden
 */

/**
 * Model factory
 */
namespace Aiello1\Antonio\Model;

/**
 * Class Factory
 * @package Ess\M2ePro\Model
 */
class Factory
{
    protected $helperFactory;
    protected $objectManager;

    //########################################

    /**
     * Construct
     *
     * @param \Ess\M2ePro\Helper\Factory $helperFactory
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     */
    public function __construct(
        \Aiello1\Antonio\Helper\Factory $helperFactory,
        \Magento\Framework\ObjectManagerInterface $objectManager
    ) {
        $this->helperFactory = $helperFactory;
        $this->objectManager = $objectManager;
    }

    //########################################

    /**
     * @param $modelName
     * @param array $arguments
     * @return \Ess\M2ePro\Model\AbstractModel
     * @throws \Ess\M2ePro\Model\Exception\Logic
     */
    public function getObject($modelName, array $arguments = [])
    {
        // fix for Magento2 sniffs that forcing to use ::class
        $modelName = str_replace('_', '\\', $modelName);

        $model = $this->objectManager->create('\Aiello1\Antonio\Model\\'.$modelName, $arguments);

        if (!$model instanceof \Aiello1\Antonio\Model\AbstractModel) {
            throw new \Aiello1\Antonio\Model\Exception\Logic(
                __('%1 doesn\'t extends \Aiello1\Antonio\Model\AbstractModel', $modelName)
            );
        }

        return $model;
    }

    //########################################
}
