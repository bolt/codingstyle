Bolt coding style standard
==========================

PHP
---

[Bolt](https://github.com/bolt) tries to adhere a coding style based on PSR-2
and the Symfony2 coding standard.

### [CodeSniffer][phpcs]

To use run:
```
composer require bolt/codingstyle squizlabs/php_codesniffer escapestudios/symfony2-coding-standard:^3.0@dev --dev
```
Add a `global` before `require` if you want to install it globally.

If installing globally you also need to configure the `installed_paths`:
```
phpcs --config-set installed_paths "$(composer config --global data-dir)"
```

Then create a CodeSniffer config file named `phpcs.xml.dist`:
```xml
<?xml version="1.0"?>
<ruleset>
    <!-- Add color to output...umm duh -->
    <arg name="colors"/>

    <!-- Files or folders to sniff -->
    <file>src</file>
    <file>tests</file>

    <!-- Path to our coding standard folder -->
    <rule ref="vendor/bolt/codingstyle/Bolt"/>
</ruleset>
```
Additional changes can be made here. See [CodeSniffer's annotated ruleset][phpcs_ruleset] for more information.

JavaScript
----------

There's no explicitly written style yet, but when creating the files needed for
Bolt using the grunt toolchain there's a target linting the javascript code.

[phpcs]: http://pear.php.net/package/PHP_CodeSniffer
[phpcs_ruleset]: https://github.com/squizlabs/PHP_CodeSniffer/wiki/Annotated-ruleset.xml
