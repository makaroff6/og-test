<?php

namespace App\Adapters;

use App\Enums\GoodStatus;
use App\Models\Good;
use Exception;

class ToDeleteBehaviour
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
