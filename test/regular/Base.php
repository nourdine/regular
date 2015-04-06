<?php

use regular\Regular;

class Base extends PHPUnit_Framework_TestCase {

   const MATCHING_TEXT = "This is a link http://www.nourdine.net to my website! And this is another link www.google.com...";
   const NON_MATCHING_TEXT = "A non matching string";

   /**
    * @var regular\Regular
    */
   protected $regular = null;

   public function setUp() {
      $this->regular = new Regular("/www.([a-z]{1,}).(com|net|org)/");
   }

   public function tearDown() {
      $this->regular = null;
   }
}
