<?php

namespace GhislainPhu\Spress\Plugin\TwigExtensions;

use Yosymfony\Spress\Core\Plugin\PluginInterface;
use Yosymfony\Spress\Core\Plugin\EventSubscriber;
use Yosymfony\Spress\Core\Plugin\Event\EnvironmentEvent;

class SpressTwigExtensions implements PluginInterface
{
    public function initialize(EventSubscriber $subscriber)
    {
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
}
