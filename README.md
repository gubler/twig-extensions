# TwigExtensions

This project provides several Twig extensions for internal projects.

## Installation

The preferred method of installation is via Composer. Run the following command to install the package and add it as a requirement to your project's `composer.json`:

```bash
composer require gubler/twig-extensions
```

### Configuration

```php
$twig = new Twig_Environment($loader, $options);
$twig->addExtension(new Gubler\Twig\Extension\FileIconClassExtension());
$twig->addExtension(new Gubler\Twig\Extension\FlashMessagesExtension());
$twig->addExtension(new Gubler\Twig\Extension\InstanceOfExtension());
$twig->addExtension(new Gubler\Twig\Extension\TableSortIconExtension());
$twig->addExtension(new Gubler\Twig\Extension\TruncateExtension());
```

For Symfony, register it in your `services.yaml`

```yaml
services:
    gubler.twig_extension.file_icon_class:
        class: Gubler\Twig\Extension\FileIconClassExtension
        tags: [twig.extension]
    gubler.twig_extension.flash_messages:
        class: Gubler\Twig\Extension\FlashMessagesExtension
        tags: [twig.extension]
    gubler.twig_extension.instance_of:
        class: Gubler\Twig\Extension\InstanceOfExtension
        tags: [twig.extension]
    gubler.twig_extension.table_sort_icon:
        class: Gubler\Twig\Extension\TableSortIconExtension
        tags: [twig.extension]
    gubler.twig_extension.truncate:
        class: Gubler\Twig\Extension\TruncateExtension
        tags: [twig.extension]
```

You can also use the `MimeTypeToIconClass` library directly and inject it into your classes by registering it as a service:

```yaml
services:
    Gubler\Twig\Extension\Lib\MimeTypeToIconClass: ~
```    

## Extensions

### FileIconClass

This maps a mimetype to a FontAwesome file icon. This currently only supports the following filetypes:

- MS Word
- MS Excel
- MS PowerPoint
- PDF

All other files return a generic file icon.

```twig
{{ 'application/vnd.ms-excel'|fileIconClass }}
```

### FlashMessages

This extension will iterate through the flashes of a given Session and convert them to Bootstrap 4 alerts.

This looks for the flash keys of `success`, `warning`, `error`, and `notice`.

Creating the flashes:
```php
# In a Symfony controller:
$this->addFlash('success', 'This is a SUCCESS message');
$this->addFlash('error', 'This is an ERROR message');
$this->addFlash('warning', 'This is a WARNING message');
$this->addFlash('notice', 'This is a NOTICE message');
``` 

Rendering all flashes:

```twig
{{ flashMessages(app.session) }}
```

### InstanceOf

This extension provides PHP's `instanceof` type operator as a Twig test.

```twig
{# date is \DateTime object #}
{{ date is instanceof("\\DateTime") ? 'ok' : 'bad' }}
```

### TableSortIcon

This filter allows you to pass the column name, the sorted column name, and sort direction and get back a FontAwesome sorting icon classes.

```twig
<i class="{{ tableSortIcon('col1', 'col1', 'asc') }}"></i>
```

### Truncate

**NOTE:** This filter is only available until [this pull request](https://github.com/symfony/symfony/pull/35649) is merged and released.

The new String component's truncate feature does not currently support the "preserve" feature from the truncate function on the older Twig-Extensions package.

This is literally the Twig-Extensions' truncate filter extracted and made available for Twig 3.

This uses the `trunc` name for the filter so it does not conflict with either of the existing `truncate` filters from String or Twig-Extensions.

```twig
{{ 'Really long string'|trunc(5, true, '> more') }}
```

## Contributing

Contributions are welcome! Please read [CONTRIBUTING][contributing] for details.

This project adheres to a [Contributor Code of Conduct][conduct]. By participating in this project and its community, you are expected to uphold this code.

## Copyright and License

The gubler/twig-extensions library is copyright © [Daryl Gubler](http://dev88.co/) and licensed for use under the MIT License (MIT). Please see [LICENSE][] for more information.

[conduct]: https://github.com/gubler/twig-extensions/blob/master/CODE_OF_CONDUCT.md
[packagist]: https://packagist.org/packages/gubler/twig-extensions
[composer]: http://getcomposer.org/
[contributing]: https://github.com/gubler/twig-extensions/blob/master/CONTRIBUTING.md
[source]: https://github.com/gubler/twig-extensions
[release]: https://packagist.org/packages/gubler/twig-extensions
[license]: https://github.com/gubler/twig-extensions/blob/master/LICENSE
[build]: https://travis-ci.org/gubler/twig-extensions
[coverage]: https://coveralls.io/r/gubler/twig-extensions?branch=master
[downloads]: https://packagist.org/packages/gubler/twig-extensions
