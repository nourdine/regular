<?php

namespace regular;

use RuntimeException;

/**
 * UE! Ma e' regolare? [Cit.] Daveoncode in Milan
 */
class Regular {

   protected $pattern = null;

   /**
    * @param string $pattern A string containing a valid regexp
    */
   public function __construct($pattern) {
      $this->pattern = $pattern;
   }

   /**
    * @param string $string The text to search for matches
    * @return Match
    * @throws RuntimeException
    */
   public function match($string) {
      $matches = array();
      $result = preg_match($this->pattern, $string, $matches, PREG_OFFSET_CAPTURE);
      if ($result === false) {
         throw new RuntimeException("Regexp engine failure");
      }
      return new Match($result, $matches);
   }

   /**
    * @param string $string The text to test against the regexp
    * @return boolean
    * @throws RuntimeException
    */
   public function test($string) {
      $match = $this->match($string);
      return $match->isSuccess();
   }
}
