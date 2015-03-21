<?php

namespace regular;

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
    * @return \regular\Matches
    * @throws \RuntimeException
    */
   public function match($string) {
      $matches = array();
      $result = preg_match($this->pattern, $string, $matches);
      if ($result === false) {
         throw new \RuntimeException("Regexp engine failure");
      }
      return new Matches($result, $matches);
   }
}