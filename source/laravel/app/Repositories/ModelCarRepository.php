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

    public function findById(string $id): object|null
    {
        return $this->entity->find($id);
    }

    public function create(array $data): ModelCar
    {
        $model = $this->entity
                ->create([
                    'name' => $data['name'],
                    'brand_id' => $data['brand_id'],
                ]);

        return $model;
    }

    public function update(string $id, array $data): object|null
    {
        if(!$model = $this->findById($id)){
            return null;
        }

        $model->update($data);

        return $model;
    }

    public function delete(string $id): bool
    {
        if(!$model = $this->findById($id)){
            return false;
        }

        return $model->delete();
    }
}
