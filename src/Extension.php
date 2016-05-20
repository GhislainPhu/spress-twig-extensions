<?php

namespace GhislainPhu\Spress\Plugin\TwigExtensions;

use \Yosymfony\Spress\Core\ContentManager\Renderizer\TwigRenderizer;

/**
 * Extension
 *
 * @author Ghislain PHU <contact@ghislainphu.fr>
 */
class Extension
{
    /**
     * Twig extension
     *
     * @var \Twig_Extension
     */
    protected $extension;

    /**
     * Constructor
     *
     * @param \Twig_Extension $extension Twig extension
     */
    public function __construct(\Twig_Extension $extension)
    {
        $this->extension = $extension;
    }

    /**
     * Load all filters provided by the current extension into the TwigRenderizer
     *
     * @param TwigRenderizer $renderizer Twig renderizer
     */
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
