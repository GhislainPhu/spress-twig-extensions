<?php

namespace GhislainPhu\Spress\Plugin\TwigExtensions;

use Yosymfony\Spress\Core\Plugin\PluginInterface;
use Yosymfony\Spress\Core\Plugin\EventSubscriber;
use Yosymfony\Spress\Core\Plugin\Event\EnvironmentEvent;

class SpressTwigExtensions implements PluginInterface
{
    public function initialize(EventSubscriber $subscriber)
    {
        $subscriber->addEventListener('spress.start', 'onStart');
    }

    public function getMetas()
    {
        return [
            'name'        => 'ghislainphu/spress-twig-extensions',
            'description' => 'Add twig/extensions to Spress.',
            'author'      => 'Ghislain PHU',
            'license'     => 'MIT',
        ];
    }

    public function onStart(EnvironmentEvent $event)
    {
        $configValues = $event->getConfigValues();
        $configValues['twig_extensions'] = (new Configuration($configValues))->getExtensions();
        $event->setConfigValues($configValues);

        $factory = new ExtensionFactory();
        $renderizer = $event->getRenderizer();

        foreach ($configValues['twig_extensions'] as $extension) {
            $factory->getExtension($extension)->load($renderizer);
        }
    }
}
