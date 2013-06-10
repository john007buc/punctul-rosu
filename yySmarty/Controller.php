<?php
/**
 * Controller
 */
class Controller
{
    /**
     * Constructor
     *
     * Get  EasyContaier and Smarty instances
     */
    public function __construct()
    {
        $this->ioc=EasyContainer::getInstance();

        //only if closures are suported
        //$this->smarty=$container->smarty;
        //else use
        $this->smarty=new iiSmarty();
    }
}
?>