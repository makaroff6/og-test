
<?php

namespace App\Interfaces;

use App\Models\Good;

class GoodStatusMove
{
  public function execute(GoodStatusMoveInterface $interface, Good $good): void 
  {
    $interface->execute($good);
  }
}
