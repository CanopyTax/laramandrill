<?php namespace CanopyTax\Laramandrill\Facades;
 
use Illuminate\Support\Facades\Facade;
 
class Laramandrill extends Facade {
 
  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor() 
  {
  	return 'laramandrill'; 
  }
 
}