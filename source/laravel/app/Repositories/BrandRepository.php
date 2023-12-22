<?php

namespace App\Repositories;

use App\Models\BrandCar;

class BrandRepository
{
    protected $entity;

    public function __construct(BrandCar $model)
    {
        $this->entity = $model;
    }

    public function getAllBrands()
    {
        return $this->entity->get();
    }

    public function getBrand(string $id)
    {
        return $this->entity->findOrFail($id);
    }

    public function findById(string $id): object|null
    {
        return $this->entity->find($id);
    }

    public function create(array $data): BrandCar
    {
        $model = $this->entity
                ->create([
                    'name' => $data['name'],
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
