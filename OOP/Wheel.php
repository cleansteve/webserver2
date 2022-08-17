<?php
//Do this sooner than later - https://www.codecademy.com/courses/learn-php/videos/classes-and-objects-video

class Wheel{
    public int $size;
    public string $color;
  
    public function __construct(int $size, string $color){
      $this->size = $size;
      $this->color = $color;
    }
   
    public function pretty() : string 
    {
      return "My Wheel is $this->size inch big and is $this->color and has a surface of " . $this->surface() . " square inch";
    }
  
    public function surface() : float
    {
      return $this->size * 2 * pi();
    }
  }
  
  ?>