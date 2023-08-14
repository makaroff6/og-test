<?php

namespace App\Adapter;

use App\Models\Good;
use App\Contracts\GoodStatusInterface;

class GoodStatusAdapter extends GoodStatusInterface
{
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
