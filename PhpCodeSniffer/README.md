#Bolt PHP coding style standard

[Bolt](https://github.com/bolt) tries to adhere a coding style based on PSR-2 and the Symfony2 coding standard.
To help following our standard a ruleset for [PHP_CodeSniffer](http://pear.php.net/package/PHP_CodeSniffer) is provided.

This standard is a work in progress and will be refined over time!


##Installation

- Install/update using composers `--require-dev` command
- Install PHP_CodeSniffer or use the one that is installed with composer
- Start phpcs with `--standard=<path-to-bolt-codingstyle>/PhpCodeSniffer/Bolt`


##Usage

There are various ways to run PHP_CodeSniffer. Here are a few for different development environments listed.

### CLI

Run the following from the commandline:
`phpcs --standard=<path-to-bolt-codingstyle>/PhpCodeSniffer/Bolt`

### NetBeans

#### _IDE_

As of 8.0 there's no way to specify standards-path directly. You would have to copy over Bolt and Symfony2 standards
directory by hand and would have to adjust the path to the Symfony2 ruleset inside Bolt ruleset.

#### _PHPCSMD_

* Install [PHPCSMD](http://plugins.netbeans.org/plugin/42434/phpcsmd) plugin.
* Specify the path to standards directory `<path-to-bolt-codingstyle>/PhpCodeSniffer/Bolt` in
  Options | PHP | PHPCSMD | "--standard".

### Eclipse

* Install Eclipse PTI plugin. (http://www.phpsrc.org/projects/pti/wiki/Installation)
* You need to check PTI Core and PHP Tool CodeSniffer at least.
* Overwrite PTI CodeSniffer plugin sources with that comes with Bolt …
* … PTI CodeSniffer is here about:
  <path_to_eclipse>/plugins/org.phpsrc.eclipse.pti.library.pear_1.2.2.R20120127000000/php/library/PEAR/PHP/
* … Our codesniffer is here: <bolt_project_path>/vendor/squizlabs/php_codesniffer/

#### _Setting up PTI CodeSniffer in Eclipse_

* Go to `Window - Preferences - PHP Tools - PHP CodeSniffer`
* Setup your PHP Executable and PEAR library
* Beside the `CodeSniffer Standards` box click `New` button and add Bolt as new standard with the
  path `<bolt_project_path>/PhpCodeSniffer/Bolt`
* May check Bolt as default standard now in the list

#### _Check validation settings_

* Go to `Window - Preferences - Validation` and check in `CodeSniffer validation` as you need Manual or Build mode or
* enable it for your `Project specific settings` at `Project - Properties - Validation`

Finally you may need `Problems` view to open to see results wehn you clicked `Validate` on a php file.

### PhpStorm

See [here] (http://www.jetbrains.com/phpstorm/webhelp/using-php-code-sniffer-tool.html) and add
`<path-to-bolt-codingstyle>/PhpCodeSniffer/Bolt` as described in point "To appoint a custom coding style to use".

### Others

See the manual of your editor if it supports PHP_CodeSniffer and how to use it.
