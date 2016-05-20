<?php

namespace GhislainPhu\Spress\Plugin\TwigExtensions;

class ExtensionFactory
{
    public function getExtension($name)
    {
        $classmap = self::getClassmap();

        if (isset($classmap[$name])) {
            $twigExtension = new $classmap[$name]();
            return new Extension($twigExtension);
        }

        $supported = implode(', ', array_keys($classmap));

        throw new \UnexpectedValueException("Cannot load extension `$name`. Supported: $supported.");
    }

    protected static function getClassmap()
    {
        return array(
            'array' => 'Twig_Extensions_Extension_Array',
            'intl'  => 'Twig_Extensions_Extension_Intl',
            'text'  => 'Twig_Extensions_Extension_Text',
        );
    }
}
