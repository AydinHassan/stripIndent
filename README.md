StripIndent
===========
[![Build Status](https://travis-ci.org/AydinHassan/stripIndent.svg?branch=master)](https://travis-ci.org/AydinHassan/stripIndent)
[![Coverage Status](https://img.shields.io/coveralls/AydinHassan/stripIndent.svg)](https://coveralls.io/r/AydinHassan/stripIndent)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Vendor/Lib/badges/quality-score.png)](https://scrutinizer-ci.com/g/Vendor/Lib/)
[![Latest Stable Version](https://poser.pugx.org/vendor/lib/version.png)](https://packagist.org/packages/aydin-hassan/magento-core-mapper)
[![Latest Stable Version](https://poser.pugx.org/aydin-hassan/strip-indent/v/stable.svg)](https://packagist.org/packages/aydin-hassan/strip-indent)

A tiny library for stripping indents from multi-line scripts, inspired by: [sindresorhus/strip-indent](https://github.com/sindresorhus/strip-indent)

The indent amount is counted for the second row, (not the row containing the string declaration). This indent count is
removed from each line.

Installation
------------

### Composer

```shell
composer require aydin-hassan/strip-indent
```

Usage
-----

```php
<?php
use function AydinHassan\stripIndent;

$multiLineString = '
    <VirtualHost>
        <one>
            <two>
            </two>
        </one>
    </VirtualHost>
    ';

echo stripIndent($line);
```

Output:
```
<VirtualHost>
    <one>
        <two>
        </two>
    </one>
</VirtualHost>
```