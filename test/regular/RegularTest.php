<?php

use regular\Match;

class RegularTest extends Base {

   public function testMatchMethod() {
      $match = $this->regular->match(self::MATCHING_TEXT);
      $this->assertTrue($match instanceof Match);
   }

   public function testTestMethod() {
      $this->assertTrue($this->regular->test(self::MATCHING_TEXT));
      $this->assertFalse($this->regular->test(self::NON_MATCHING_TEXT));
   }
}
