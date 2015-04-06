<?php

class MatchTest extends Base {

   /**
    * @expectedException RuntimeException
    */
   public function testNoSuccessAndFurtherCallToWholeMatch() {
      $result = $this->regular->match(self::NON_MATCHING_TEXT);
      $result->getWholeMatch();
   }

   public function testWholeMatch() {
      $result = $this->regular->match(self::MATCHING_TEXT);
      $this->assertEquals("www.nourdine.net", $result->getWholeMatch()->getValue());
   }

   public function testGetCaptured() {
      $result = $this->regular->match(self::MATCHING_TEXT);
      $this->assertEquals("nourdine", $result->getCaptured(0)->getValue());
      $this->assertEquals("net", $result->getCaptured(1)->getValue());
   }
}
