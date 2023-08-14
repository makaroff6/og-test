<?php

namespace App\Adapters;

use App\Enums\GoodStatus;
use App\Models\Good;
use Exception;

class GoodStatusInterface
{
  public GoodStatus $statusTo = GoodStatus::SOLD;

  public function execute(Good $good): void 
  {
    if ($good->status === $this->statusTo) {
      throw new Exception('Неверный статус');
    }
    $good->status = $this->statusTo;
    $good->active = false;
    $good->save();
  }
}
