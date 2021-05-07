<?php

namespace App\Services\Interfaces;

interface ICrud
{
    /**
     * @return array
     */
    public function all();
    /**
     * @param int $id
     * @return Model
     */
    public function getById(int $id);
    /**
     * @param array $model
     * @return void
     */
    public function create($model);
    /**
     * @param array $model
     * @param int $id
     * @return boolean
     */
    public function update(array $model, int $id);
    /**
     * @param int $id
     * @return boolean
     */
    public function destroy(int $id);
}
