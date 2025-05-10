<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class IdGeneratorFacade extends Facade
{
  protected static function getFacadeAccessor()
  {
    return 'idgenerator';
  }
}
