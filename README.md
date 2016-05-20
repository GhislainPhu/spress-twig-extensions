# Spress Twig Extensions

![Spress 2 ready](https://img.shields.io/badge/Spress%202-ready-brightgreen.svg?style=flat)

This [Spress](https://github.com/spress/Spress) plugin provides extra [Twig](https://github.com/twigphp/Twig) filters from [twig/extensions](https://github.com/twigphp/Twig-extensions).

## Getting Started

Add the following lines to your `composer.json` and run `composer update`:

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/GhislainPhu/spress-twig-extensions"
    }
],
"require": {
    "ghislainphu/spress-twig-extensions": "dev-master"
}
```

Add this line to your `config.yml`:

```yaml
twig_extensions: [ array, intl, text ]
```

## Features

- [shuffle](https://github.com/twigphp/Twig-extensions/blob/master/doc/array.rst) (array)
- [localizeddate](https://github.com/twigphp/Twig-extensions/blob/master/doc/intl.rst#localizeddate) (intl)
- [localizednumber](https://github.com/twigphp/Twig-extensions/blob/master/doc/intl.rst#localizednumber) (intl)
- [localizedcurrency](https://github.com/twigphp/Twig-extensions/blob/master/doc/intl.rst#localizedcurrency) (intl)
- [truncate](https://github.com/twigphp/Twig-extensions/blob/master/doc/text.rst#truncating-text) (text)
- [wordwrap](https://github.com/twigphp/Twig-extensions/blob/master/doc/text.rst#wrapping-words) (text)

## Limitations

`date` and `i18n` extensions are not yet supported.

## License

This project is licensed under the MIT License.

See [LICENSE.md](https://github.com/GhislainPhu/spress-twig-extensions/blob/master/LICENSE.md) for more informations.
