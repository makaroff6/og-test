<?php

namespace App\Services;

use App\Interfaces\GoodStatusMove;
use App\Adapters\ToNewAdapter;
use App\Adapters\ToSellingAdapter;
use App\Adapters\ToSoldAdapter;
use App\Adapters\ToDeleteAdapter;
use App\Models\Good;

class GoodService
{
  protected $classModel = Good::class;

  protected $goodStatusMove;
  protected $newAdapter;
  protected $sellingAdapter;
  protected $soldAdapter;
  protected $deleteAdapter;

  public function __construct(
      GoodStatusMove $goodStatusMove,
      ToNewAdapter $newAdapter,
      ToSellingAdapter $sellingAdapter,
      ToSoldAdapter $soldAdapter,
      ToDeleteAdapter $deleteAdapter
    ) 
  {
    $this->goodStatusMove = $goodStatusMove;
    $this->newAdapter = $newAdapter;
    $this->sellingAdapter = $sellingAdapter;
    $this->soldAdapter = $soldAdapter;
    $this->deleteAdapter = $deleteAdapter;
  }

  public function create(array $attributes): Good 
  {
    $model = $this->classModel::create($attributes);
    $this->goodStatusMove->execute($this->newAdapter, $model);
    $model->fresh();
    return $model;
  }

  public function update(int $id, array $attributes): Good 
  {
    $model = $this->classModel::findOrFail($id);
    $model->update($attributes);
    if ($attributes['count'] > 0) {
      $adapter = $this->sellingAdapter;
    } else {
      $adapter = $this->soldAdapter;
    }
    $this->goodStatusMove->execute($adapter, $model);
    $model->fresh();
    return $model;
  }

  public function delete(int $id)
  {
    $model = $this->classModel::findOrFail($id);
    $this->goodStatusMove->execute($this->deleteAdapter, $model);
    $model->delete();
  }
}
