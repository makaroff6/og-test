<?php

namespace App\Adapters;

use App\Enums\GoodStatus;
use App\Models\Good;
use App\Strategies\GoodStatusMoveInterface;
use Exception;

class ToNewAdapter extends GoodStatusMoveInterface
{
  public GoodStatus $statusTo = GoodStatus::SOLD;

  public function execute(Good $good): void 
  {
    if ($good->status === $this->statusTo) {
      throw new Exception('Неверный статус');
    }
    $good->status = $this->statusTo;
    $good->save();
  }
}