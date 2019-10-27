<?php

namespace Aiello1\Antonio\Block;

use Magento\Framework\View\Element\Template as TemplateAlias;

class Display extends TemplateAlias
{
  public  $pippo=0;
    public function __construct(\Magento\Framework\View\Element\Template\Context $context, array $data = [])
    {

        parent::__construct($context,$data);

        $pippo = 10;
    }
    public function sayHello()
    {
        return __('Hello World');
    }
}
