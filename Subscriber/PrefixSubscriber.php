<?php
/**
 * Created by PhpStorm.
 * User: KAZI
 * Date: 30/01/2019
 * Time: 10:55
 */

namespace SwagCustomArticle\Subscriber;

use Enlight\Event\SubscriberInterface;
use Shopware\Components\Plugin\ConfigReader;
use SwagCustomArticle\Components\PrefixPrinter;

class PrefixSubscriber implements SubscriberInterface
{

    private $pluginDirectory;
    private $prefixPrinter;
    private $config;

    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatchSecure_Frontend_Detail' => 'onPostDispatch',
        ];
    }

    public function __construct($pluginName, $pluginDirectory, PrefixPrinter $prefixPrinter, ConfigReader $configReader)
    {
        $this->pluginDirectory = $pluginDirectory;
        $this->prefixPrinter = $prefixPrinter;

        $this->config = $configReader->getByPluginName($pluginName);
        var_dump($this->config);
    }

    public function onPostDispatch(\Enlight_Controller_ActionEventArgs $args){
        /** @var \Enlight_Controller_Action $controller */
        $controller = $args->getSubject();
        $view = $controller->View();
        $view->addTemplateDir($this->pluginDirectory . '/Resources/views');
        $view->assign('titlePrefix', $this->config['titlePrefix']);
        $view->assign('titleItalic', $this->config['titleItalic']);

        if(!$this->config['titlePrefix'])
        {
            $view->assign('titleString', $this->prefixPrinter->getPrefix());
        }
    }
}