<?php

namespace App\Adapters;

use App\Enums\GoodStatus;
use App\Models\Good;
use App\Interfaces\GoodStatusInterface;
use Exception;

class ToSellingBehaviour extends GoodStatusInterface
{
  public GoodStatus $statusTo = GoodStatus::SELLING;

  public function execute(Good $good): void 
  {
    if ($good->status === $this->statusTo) {
      throw new Exception('Неверный статус');
    }
    $good->status = $this->statusTo;
    $good->active = true;
    $good->save();
  }
}
