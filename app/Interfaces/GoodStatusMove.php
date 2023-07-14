
<?php

namespace App\Interfaces;

use App\Models\Good;

class GoodStatusMove
{
    /**
    * @var GoodStatusMoveInterface
    */
    private $adapter;
    
    public function setAdapter(GoodStatusMoveInterface $adapter): self
    {
        $this->adapter = $adaper;
        return $this;
    }
    
  public function execute(Good $good): void 
  {
    $this->adapter->execute($good);
  }
}
