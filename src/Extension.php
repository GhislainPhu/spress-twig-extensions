<?php

namespace GhislainPhu\Spress\Plugin\TwigExtensions;

use \Yosymfony\Spress\Core\ContentManager\Renderizer\TwigRenderizer;

class Extension
{
    protected $extension;

    public function __construct(\Twig_Extension $extension)
    {
        $this->extension = $extension;
    }

    public function load(TwigRenderizer $renderizer)
    {
        $filters = $this->extension->getFilters();

        foreach ($filters as $filter) {
            $name = $filter->getName();
            $callable = $filter->getCallable();
            $options = array('needs_environment' => $filter->needsEnvironment());

            $renderizer->addTwigFilter($name, $callable, $options);
        }
    }
}
