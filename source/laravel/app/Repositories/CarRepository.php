<?php

namespace App\Repositories;

use App\Models\Car;

class CarRepository
{
    protected $entity;

    public function __construct(Car $model)
    {
        $this->entity = $model;
    }

    public function getAllCars()
    {
        return $this->entity
                        ->join('brand_cars AS b', 'b.id', '=', 'cars.brand_id')
                        ->join('model_cars AS m', 'm.id', '=', 'cars.model_id')
                        ->join('color_cars AS c', 'c.id', '=', 'cars.color_id')
                        ->select(
                            'cars.id','b.name AS brand','m.name AS model','c.name AS color',
                            'cars.doors','cars.year','cars.km','cars.price','cars.created_at')
                        ->get();
    }

    public function getCar(string $id)
    {
        return $this->findById($id);
    }

    public function findById(string $id): object|null
    {
        return $this->entity
                        ->join('brand_cars AS b', 'b.id', '=', 'cars.brand_id')
                        ->join('model_cars AS m', 'm.id', '=', 'cars.model_id')
                        ->join('color_cars AS c', 'c.id', '=', 'cars.color_id')
                        ->select(
                            'cars.id','b.name AS brand','m.name AS model','c.name AS color',
                            'cars.doors','cars.year','cars.km','cars.price','cars.created_at')
                        ->where('cars.id', $id)
                        ->first();
    }

    public function create(array $data): Car
    {
        $model = $this->entity
                ->create([
                    'brand_id' => $data['brand_id'],
                    'model_id' => $data['model_id'],
                    'color_id' => $data['color_id'],
                    'doors' => $data['doors'],
                    'year' => $data['year'],
                    'km' => $data['km'],
                    'price' => $data['price'],
                ]);

        return $this->findById($model->id);
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
