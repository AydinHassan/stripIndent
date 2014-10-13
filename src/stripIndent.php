<?php

namespace AydinHassan;

/**
 * Strips indents from a multi-line string using
 * the second line indent to determine how much space to remove
 * to strip of each line.
 *
 * @param string $multiLineString
 * @return string
 */
function stripIndent($multiLineString)
{
    $lines = explode("\n", $multiLineString);

    if (count($lines) < 1) {
        return $multiLineString;
    }

    $firstLine  = $lines[1];
    $matches    = [];
    //grab position of first non whitespace character
    preg_match('/\S/', $firstLine, $matches, PREG_OFFSET_CAPTURE);
    $whiteSpaceCount = $matches[0][1];

    $strippedLines = [];
    for ($i = 0; $i < count($lines); $i++) {

        if ($i === 0) {
            continue;
        }

        $line               = $lines[$i];
        $strippedLines[]    = substr($line, $whiteSpaceCount);
    }

    $nonWhiteSpace  = trim($line);
    if (empty($nonWhiteSpace)) {
        array_pop($strippedLines);
    }

    $return = implode("\n", $strippedLines);
    return $return;
}
