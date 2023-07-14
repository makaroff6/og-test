
<?php

namespace App\Adapter;

use App\Models\Good;

class GoodStatusMove
{
  /**
  * @var GoodStatusMoveInterface
  */
  private $behaviour;
    
  public function setBehaviour(GoodStatusMoveInterface $behaviour): self
  {
    $this->behaviour = $behaviour;
    return $this;
  }
    
  public function execute(Good $good): void 
  {
    $this->adapter->execute($good);
  }
}
