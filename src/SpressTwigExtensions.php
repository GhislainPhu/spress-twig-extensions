<?php

namespace GhislainPhu\Spress\Plugin\TwigExtensions;

use Yosymfony\Spress\Core\Plugin\PluginInterface;
use Yosymfony\Spress\Core\Plugin\EventSubscriber;
use Yosymfony\Spress\Core\Plugin\Event\EnvironmentEvent;

/**
 * Spress Plugin entry point
 *
 * @author Ghislain PHU <contact@ghislainphu.fr>
 */
class SpressTwigExtensions implements PluginInterface
{
    /**
     * Initialize plugin: subscribe to events
     *
     * @param EventSubscriber $subscriber
     */
    public function initialize(EventSubscriber $subscriber)
    {
        $subscriber->addEventListener('spress.start', 'onStart');
    }

    /**
     * Get plugin metadatas
     *
     * @return array
     */
    public function getMetas()
    {
        return [
            'name'        => 'ghislainphu/spress-twig-extensions',
            'description' => 'Add twig/extensions to Spress.',
            'author'      => 'Ghislain PHU',
            'license'     => 'MIT',
        ];
    }

    /**
     * Load requested Twig extensions on startup
     *
     * @param EnvironmentEvent $event The start event
     * @throws \UnexpectedValueException if a requested extension doesn't exists
     */
    public function onStart(EnvironmentEvent $event)
    {
        $configValues = $event->getConfigValues();
        $configValues['twig_extensions'] = (new Configuration($configValues))->getExtensions();
        $event->setConfigValues($configValues);

        $factory = new ExtensionFactory();
        $renderizer = $event->getRenderizer();

        foreach ($configValues['twig_extensions'] as $extension) {
            try {
                $factory->getExtension($extension)->load($renderizer);
            } catch(\UnexpectedValueException $e) {
                $event->getIO()->warning($e->getMessage());
            }
        }
    }
}
