<?php

namespace FuzzyWuzzy;

/**
 * Convenience methods for working with string values.
 *
 * @author Michael Crumm <mike@crumm.net>
 */
class StringProcessor {

  /**
   * @param $str
   *
   * @return string
   */
  public static function nonAlnumToWhitespace($str) {
    if (phpversion() > 5.5) {
      return mb_ereg_replace('/(?i)\W/u', ' ', $str);
    }
    else {
      return preg_replace('/(?i)\W/u', ' ', $str);
    }

  }

  /**
   * @param $str
   *
   * @return string
   */
  public static function upcase($str) {
    if (phpversion() > 5.5) {
      return mb_strtoupper($str);
    }
    else {
      return strtoupper($str);
    }
  }

  /**
   * @param $str
   *
   * @return string
   */
  public static function downcase($str) {
    if (phpversion() > 5.5) {
      return mb_strtolower($str);
    }
    else {
      return strtolower($str);
    }
  }

  /**
   * @param $pieces
   * @param string $glue
   *
   * @return string
   */
  public static function join($pieces, $glue = ' ') {
    return Collection::coerce($pieces)->join($glue);
  }

  /**
   * @param $str
   * @param string $delimiter
   *
   * @return Collection
   */
  public static function split($str, $delimiter = ' ') {

    if (phpversion() > 5.5) {
      return new Collection(mb_split($delimiter, $str));
    }
    else {
      return new Collection(explode($delimiter, $str));
    }
  }

  /**
   * @param $str
   * @param string $chars
   *
   * @return string
   */
  public static function strip($str, $chars = " \t\n\r\0\x0B") {
    return trim($str, $chars);
  }

}
