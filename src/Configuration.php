<?php

namespace GhislainPhu\Spress\Plugin\TwigExtensions;

/**
 * Configuration
 *
 * @author Ghislain PHU <contact@ghislainphu.fr>
 */
class Configuration
{
    /**
     * Site configuration
     *
     * @var array
     */
    protected $configuration;

    /**
     * Constructor
     *
     * @param array $configuration The whole configuration from config.yml
     */
    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * Get the list of Twig extensions to load
     *
     * @return array The list of extensions to load
     *
     * @see ExtensionFactory::getClassmap()
     */
    public function getExtensions()
    {
        $isValid = isset($this->configuration['twig_extensions']);
        $isValid = $isValid && is_array($this->configuration['twig_extensions']);

        if ($isValid) {
            return array_filter($this->configuration['twig_extensions'], 'is_string');
        }

        return array();
    }
}
