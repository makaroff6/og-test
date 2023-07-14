<?php

namespace App\Services;

use App\Interfaces\GoodStatusInterface;
use App\Adapters\ToNewBehaviour;
use App\Adapters\ToSellingBehaviour;
use App\Adapters\ToSoldBehaviour;
use App\Adapters\ToDeleteBehaviour;
use App\Models\Good;

class GoodService
{
  protected $classModel = Good::class;

  protected $goodStatusInterface;
  protected $newBehaviour;
  protected $sellingBehaviour;
  protected $soldBehaviour;
  protected $deleteBehaviour;

  public function __construct(
      GoodStatusInterface $goodStatusInterface,
      ToNewBehaviour $newBehaviour,
      ToSellingBehaviour $sellingBehaviour,
      ToSoldBehaviour $soldBehaviourr,
      ToDeleteBehaviour $deleteBehaviour
    ) 
  {
    $this->goodStatusInterface = $goodStatusInterface;
    $this->newBehaviour = $newBehaviour;
    $this->sellingBehaviour = $sellingBehaviour;
    $this->soldBehaviour = $soldBehaviour;
    $this->deleteBehaviour = $deleteBehaviour;
  }

  public function create(array $attributes): Good 
  {
    $model = $this->classModel::create($attributes);
    $this->goodStatusInterface->setBehaviour($this->newBehaviour);
    $this->goodStatusInterface->execute($model);
    $model->fresh();
    return $model;
  }

  public function update(int $id, array $attributes): Good 
  {
    $model = $this->classModel::findOrFail($id);
    $model->update($attributes);
    if ($attributes['count'] > 0) {
      $behaviour = $this->sellingBehaviour;
    } else {
      $behaviour = $this->soldBehaviour;
    }
    $this->goodStatusInterface->setBehaviour($behaviour);
    $this->goodStatusInterface->execute($model);
    $model->fresh();
    return $model;
  }

  public function delete(int $id)
  {
    $model = $this->classModel::findOrFail($id);
    $this->goodStatusInterface->setBehaviour($this->deleteBehaviour);
    $this->goodStatusInterface->execute($model);
    $model->delete();
  }
}
