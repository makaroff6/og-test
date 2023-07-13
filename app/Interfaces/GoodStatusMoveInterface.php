<?php

namespace App\Strategies;

use App\Enums\GoodStatus;
use App\Models\Good;

abstract class GoodStatusMoveInterface
{
  public GoodStatus $statusTo;

  abstract function execute(Good $good): void;
}