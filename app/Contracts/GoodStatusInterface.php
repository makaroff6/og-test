<?php

namespace App\Contracts;

use App\Enums\GoodStatus;
use App\Models\Good;

abstract class GoodStatusInterface
{
  public GoodStatus $statusTo;

  abstract function execute(Good $good): void;
}
