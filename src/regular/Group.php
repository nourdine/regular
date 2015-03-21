<?php

namespace regular;

class Group {

   private $group;

   public function __construct(array $group) {
      $this->group = $group;
   }

   public function getValue() {
      return $this->group[0];
   }

   public function getOffset() {
      return $this->group[1];
   }
}
