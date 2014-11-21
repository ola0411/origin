<?php

/**
 * @file
 * File with my custom functions.
 */

/**
 * Implements function for trim some text.
 *
 * @param string $str
 *   Some text for trimming.
 * @param int $maxLen
 *   Numbers for max lenght.
 *
 * @return string $some_text
 *   Text after trimming.
 */
function textFunc($str, $maxLen) {
  if (mb_strlen($str) > $maxLen) {
    preg_match('/^.{0,'.$maxLen.'} .*?/ui', $str, $match );
    $some_text = $match[0] . '...';
  }
  else {
    $some_text = $str;
  }

  return $some_text;
}
