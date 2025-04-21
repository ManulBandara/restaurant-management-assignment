<?php

namespace App\Repositories;

use App\Models\Concession;

class ConcessionRepository
{
    protected $model;

    public function __construct(Concession $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update($id, array $data)
    {
        $concession = $this->find($id);
        $concession->update($data);
        return $concession;
    }

    public function delete($id)
    {
        $concession = $this->find($id);
        $concession->delete();
    }
}