
<?php

namespace App\Adapter;

use App\Models\Good;

class GoodStatusAdapter
{
  /**
  * @var GoodStatusInterface
  */
  private $behaviour;
    
  public function setBehaviour(GoodStatusInterface $behaviour): self
  {
    $this->behaviour = $behaviour;
    return $this;
  }
    
  public function execute(Good $good): void 
  {
    $this->adapter->execute($good);
  }
}
