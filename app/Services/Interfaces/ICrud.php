<?php

namespace App\Services\Interfaces;

interface ICrud
{
    /**
     * @param int $UserId
     * @return array
     */
    public function all(int $UserId);
    /**
     * @param int $RecipeId
     * @param int $UserId
     * @return Model
     */
    public function getById(int $RecipeId);
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
