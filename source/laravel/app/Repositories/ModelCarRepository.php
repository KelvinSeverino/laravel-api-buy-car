<?php

namespace App\Repositories;

use App\Models\ModelCar;

class ModelCarRepository
{
    protected $entity;

    public function __construct(ModelCar $model)
    {
        $this->entity = $model;
    }

    public function getAllModels()
    {
        return $this->entity->get();
    }

    public function getModel(string $id)
    {
        return $this->entity->findOrFail($id);
    }
}
