<?php

namespace GhislainPhu\Spress\Plugin\TwigExtensions;

/**
 * Extension Factory
 *
 * @author Ghislain PHU <contact@ghislainphu.fr>
 */
class ExtensionFactory
{
    /**
     * Get a new Extension from a given string
     *
     * @param string $name The name of the extension
     * @throws \UnexpectedValueException if the extension is not supported
     * @return Extension
     */
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

    /**
     * Get a map of twig_extension => classname
     *
     * @return array
     */
    protected static function getClassmap()
    {
        return array(
            'array' => 'Twig_Extensions_Extension_Array',
            'intl'  => 'Twig_Extensions_Extension_Intl',
            'text'  => 'Twig_Extensions_Extension_Text',
        );
    }
}
