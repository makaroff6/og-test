<?php

namespace App\Adapters;

use App\Enums\GoodStatus;
use App\Models\Good;
use App\Strategies\GoodStatusMoveInterface;
use Exception;

class ToDeleteAdapter extends GoodStatusMoveInterface
{
  public GoodStatus $statusTo = GoodStatus::DELETED;

  public function execute(Good $good): void 
  {
    if ($good->status !== $this->statusTo) {
      throw new Exception('Неверный статус');
    }
    $good->status = $this->statusTo;
    $good->active = false;
    $good->save();
  }
}
