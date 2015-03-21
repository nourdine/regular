<?php

namespace regular;

use RuntimeException;

class Matches {

   protected $matches = null;
   protected $success = false;

   /**
    * @param integer $success
    * @param array $matches The array returned by preg_match
    */
   public function __construct($success, array $matches) {
      $this->success = ($success === 1);
      $this->matches = $matches;
   }

   /**
    * True is the pattern was found, false otherwise.
    * 
    * @return boolean
    */
   public function isSuccess() {
      return $this->success;
   }

   /**
    * Returns the array of matched created by the underlying PHP funtions employed.
    * 
    * @return array
    */
   public function debug() {
      return $this->matches;
   }

   /**
    * Return the actual full match.
    * 
    * @return string
    * @throws RuntimeException
    */
   public function getWholeMatch() {
      if ($this->success) {
         return $this->matches[0];
      } else {
         throw new RuntimeException("The matching was not succesfull");
      }
   }

   /**
    * Return a captured group.
    * 
    * @param integer $i Index of the wanted captured subgroup
    * @return string
    * @throws RuntimeException
    */
   public function getCaptured($i) {
      if ($this->success) {
         if ($i >= 0) {
            $i++;
            if (array_key_exists($i, $this->matches)) {
               return $this->matches[$i];
            } else {
               throw new RuntimeException("The index " . $i . " does not identify any captured subpattern");
            }
         } else {
            throw new RuntimeException("Negative indexes are not allowed");
         }
      } else {
         throw new RuntimeException("The matching was not succesfull");
      }
   }
}