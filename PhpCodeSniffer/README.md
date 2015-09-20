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


##Sniffs used


###Bolt

- **Bolt.Functions.FunctionCallSignature** (+)

- **Bolt.NamingConventions.AbstractPrefix** (+)

- **Bolt.NamingConventions.TraitSuffix** (+)

- **Bolt.Whitespace.ConcatenationSpacing** (+)

###Generic

- **Generic.ControlStructures.InlineControlStructure**<br>
  Control Structures should use braces.

- **Generic.Files.ByteOrderMark**

- **Generic.Files.LineEndings**<br>
  Unix-style endlines are preferred

- **Generic.Formatting.DisallowMultipleStatements**

- **Generic.Formatting.SpaceAfterCast**<br>
  Exactly one space is allowed after a cast.

- **Generic.Functions.CallTimePassByReference**<br>
  Call-time pass-by-reference is not allowed. It should be declared in the function definition.

- **Generic.Functions.FunctionCallArgumentSpacing**<br>
  Function arguments should have one space after a comma, and single spaces surrounding the equals sign for default
  values.

- **Generic.NamingConventions.UpperCaseConstantName**<br>
  Constants should always be all-uppercase, with underscores to separate words.

- **Generic.PHP.DeprecatedFunctions** (+)

- **Generic.PHP.DisallowShortOpenTag**<br>
  Always use <?php ?> to delimit PHP code, not the <? ?> shorthand.

- **Generic.PHP.ForbiddenFunctions** (+)

- **Generic.PHP.LowerCaseConstant**<br>
  The "true", "false" and "null" constants must always be lowercase.

- **Generic.PHP.LowerCaseKeyword**

- **Generic.PHP.NoSilencedErrors** (+)

- **Generic.WhiteSpace.DisallowTabIndent**<br>
  Spaces should be used for indentation instead of tabs.

- **Generic.WhiteSpace.ScopeIndent**

###PEAR

- **PEAR.Classes.ClassDeclaration**<br>
  The opening brace of a class must be on the line after the definition by itself.

- **PEAR.Commenting.InlineComment**<br>
  Perl-style # comments are not allowed.

- <del>PEAR.Functions.FunctionCallSignature</del><br>
  <del>Functions should be called with no spaces between the function name, the opening parenthesis, and the first
  parameter; and no space between the last parameter, the closing parenthesis, and the semicolon.</del>

- **PEAR.Functions.ValidDefaultValue**<br>
  Arguments with default values go at the end of the argument list.

- **PEAR.WhiteSpace.ScopeClosingBrace**<br>
  Closing braces should be indented at the same level as the beginning of the scope.

###PSR1

- **PSR1.Classes.ClassDeclaration**

- **PSR1.Files.SideEffects**

- **PSR1.Methods.CamelCapsMethodName**

###PSR2

- **PSR2.Classes.ClassDeclaration**

- **PSR2.Classes.PropertyDeclaration**

- **PSR2.ControlStructures.ControlStructureSpacing**

- **PSR2.ControlStructures.ElseIfDeclaration**

- **PSR2.ControlStructures.SwitchDeclaration**

- **PSR2.Files.ClosingTag**

- **PSR2.Files.EndFileNewline**

- **PSR2.Methods.FunctionCallSignature**

- **PSR2.Methods.MethodDeclaration**

- **PSR2.Namespaces.NamespaceDeclaration**

- **PSR2.Namespaces.UseDeclaration**

###Squiz

- **Squiz.Arrays.ArrayBracketSpacing**<br>
  No spaces around square brackets.

- **Squiz.Classes.ValidClassName**

- **Squiz.ControlStructures.ControlSignature**<br>
  Verifies that control statements conform to their coding standards.

- **Squiz.ControlStructures.ForEachLoopDeclaration**<br>
  There should be a space between each condition of foreach loops.

- **Squiz.ControlStructures.ForLoopDeclaration**<br>
  There should be a space between each condition of for loops.

- **Squiz.ControlStructures.LowercaseDeclaration**<br>
  All control structure keywords are lowercase.

- **Squiz.Functions.FunctionDeclaration**

- **Squiz.Functions.FunctionDeclarationArgumentSpacing**

- **Squiz.Functions.GlobalFunction**<br>
  No functions outside of classes.

- **Squiz.Functions.LowercaseFunctionKeywords**

- **Squiz.Functions.MultiLineFunctionDeclaration**

- **Squiz.PHP.LowercasePHPFunctions**<br>
  All calls to inbuilt PHP functions have to be lowercase.

- **Squiz.PHP.NonExecutableCode** (+)

- **Squiz.Scope.MemberVarScope**<br>
  Verifies that class members have scope modifiers.

- **Squiz.Scope.MethodScope**

- **Squiz.Scope.StaticThisUsage** (+)

- **Squiz.Strings.ConcatenationSpacing**

- **Squiz.Strings.EchoedStrings** (+)

- **Squiz.WhiteSpace.FunctionOpeningBraceSpace** (+)

- **Squiz.WhiteSpace.LanguageConstructSpacing** (+)

- **Squiz.WhiteSpace.LogicalOperatorSpacing** (+)

- **Squiz.WhiteSpace.OperatorSpacing** (+)

- **Squiz.WhiteSpace.ScopeClosingBrace**

- **Squiz.WhiteSpace.ScopeKeywordSpacing**

- **Squiz.WhiteSpace.SemicolonSpacing** (+)

- **Squiz.WhiteSpace.SuperfluousWhitespace**

###Symfony2

- **Symfony2.Arrays.MultiLineArrayComma**

- **Symfony2.Classes.MultipleClassesOneFile**<br>
  Define one class per file

- **Symfony2.Classes.PropertyDeclaration**

- <del>Symfony2.Commenting.ClassComment</del><br>
  <del>A doc comment should exists. Blank newline after short description, between the long and short description and
  between the long description and tags. Order and indentation of the tags must be ok. Required and optional tags must
  be there and the format of their content must be ok.</del>

- <del>Symfony2.Commenting.FunctionComment</del><br>
  <del>There should be a @return tag if a return statement exists inside the method.</del>

- **Symfony2.Formatting.BlankLineBeforeReturn**<br>
  Add a blank line before return statements, unless the return is alone inside a statement-group.

- **Symfony2.Functions.ScopeOrder**

- **Symfony2.NamingConventions.ValidClassName**

- **Symfony2.Objects.ObjectInstantiation**

- **Symfony2.Scope.MethodScope**<br>
  Class members should have scope modifiers.

- **Symfony2.WhiteSpace.BinaryOperatorSpacing**

- **Symfony2.WhiteSpace.CommaSpacing**

- **Symfony2.WhiteSpace.DiscourageFitzinator**<br>
  No trailing whitespace in a file

###Zend

- **Zend.Files.ClosingTag**<br>
  Files should not have closing php tags.

- **Zend.NamingConventions.ValidVariableName**<br>
  Variable names should be camelCased with the first letter lowercase. Private and protected member variables should
  begin with an underscore
