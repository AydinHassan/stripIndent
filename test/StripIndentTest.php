<?php

namespace AydinHassan;

class StripIndentTest extends \PHPUnit_Framework_TestCase
{
    public function testIndentIsRemovedFromAllLines()
    {
        $line = '
        <VirtualHost 212.34.23.123:200>

        </VirtualHost>
        ';

        $stripped = stripIndent($line);
        $expected = "<VirtualHost 212.34.23.123:200>\n\n</VirtualHost>";
        $this->assertSame($expected, $stripped);
    }

    public function testIndentIsRemovedFromNestedXml()
    {
        $line = '
        <VirtualHost>
            <one>
                <two>
                </two>
            </one>
        </VirtualHost>
        ';

        $stripped = stripIndent($line);
        $expected = "<VirtualHost>\n    <one>\n        <two>\n        </two>\n    </one>\n</VirtualHost>";
        $this->assertSame($expected, $stripped);
    }

    public function testFirstLineIsIgnored()
    {
        $line = '<VirtualHost>
        <one>
        </one>
        </VirtualHost>
        ';

        $stripped = stripIndent($line);
        $expected = "<one>\n</one>\n</VirtualHost>";
        $this->assertSame($expected, $stripped);
    }

    public function testLastLineIsIgnoredIfOnlyWhiteSpace()
    {
        $line = '<VirtualHost>
        <one>
        </one>
            </VirtualHost>
            ';

        $stripped = stripIndent($line);
        $expected = "<one>\n</one>\n    </VirtualHost>";
        $this->assertSame($expected, $stripped);
    }

    public function testLastLineIsNotIgnoredIfNotOnlyWhiteSpace()
    {
        $line = '<VirtualHost>
        <one>
        </one>
            </VirtualHost>';

        $stripped = stripIndent($line);
        $expected = "<one>\n</one>\n    </VirtualHost>";
        $this->assertSame($expected, $stripped);
    }

    public function testLineIsShorterThanIndentRemovalAmount()
    {
        $line = '<VirtualHost>
        <one>
</one>
            </VirtualHost>';

        $stripped = stripIndent($line);
        $expected = "<one>\n\n    </VirtualHost>";
        $this->assertSame($expected, $stripped);
    }
}
