<?php

use regular\Regular;

class RegularTest extends PHPUnit_Framework_TestCase {

   const TEXT = "This is a link http://www.nourdine.net to my website! And this is another link www.google.com...";
   const NON_MATCHING_TEXT = "A non matching string";

   /**
    * @var regular\Regular
    */
   private $regular = null;

   public function setUp() {
      $this->regular = new Regular("/www.([a-z]{1,}).(com|net|org)/");
   }

   public function tearDown() {
      $this->regular = null;
   }

   public function testSuccess() {
      $result = $this->regular->match(self::TEXT);
      $this->assertTrue($result->isSuccess());
   }

   public function testNoSuccess() {
      $result = $this->regular->match(self::NON_MATCHING_TEXT);
      $this->assertFalse($result->isSuccess());
   }

   /**
    * @expectedException RuntimeException
    */
   public function testNoSuccessAndFurtherCallToWholeMatch() {
      $result = $this->regular->match(self::NON_MATCHING_TEXT);
      $result->getWholeMatch();
   }

   public function testWholeMatch() {
      $result = $this->regular->match(self::TEXT);
      $this->assertEquals("www.nourdine.net", $result->getWholeMatch()->getValue());
   }

   public function testCaptured() {
      $result = $this->regular->match(self::TEXT);
      $this->assertEquals("nourdine", $result->getCaptured(0)->getValue());
      $this->assertEquals("net", $result->getCaptured(1)->getValue());
   }
}
