<?php

namespace GhislainPhu\Spress\Plugin\TwigExtensions;

class Configuration
{
    protected $configuration;

    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
    }

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
