<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    abstract public function getModel();//va aobtener el modelo con el que estoy trabajando

    public function find($id)
    {
        return $this->getModel()->find($id);//encotnrar un reistro en especifico

    }
    public function getAll()
    {
        return $this->getModel()->all();
    }
    public function insertar($data)
    {
        return $this->getModel()->create($data);
    } 
    public function actualizar ($object, $data)
    {
        $object->fill($data);
        $object->save();
        return $object;
    }
    public function eliminar($object)
    {
        $object->delete();
    }
  /*   protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $model = $this->find($id);

        if ($model) {
            $model->fill($data);
            $model->save();

            return $model;
        }

        return null;
    }

    public function delete($id)
    {
        $model = $this->find($id);

        if ($model) {
            $model->delete();
            return true;
        }

        return false;
    } */
}
