<?php

namespace App\Services\Implementations;

use App\Models\Recipe;
use App\Services\Interfaces\ICrud;

class RecipeService implements ICrud
{
    /**
     * @var Recipe
     */
    private $model;

    public function __construct(Recipe $model) {
        $this->model = $model;
    }
    public function all()
    {
        return $this->model->all();
    }

    public function getById(int $id)
    {
        return $this->model->find($id);
    }

    public function create($recipe)
    {
        $this->model->create($recipe);
    }

    public function update(array $recipe, int $id)
    {
        $userExists = $this->model->find($id);
        if($userExists != null)
            return $this->model->where('id', $id)->first()->fill($recipe)->save();
    }

    public function destroy(int $id)
    {
        $recipe = $this->model->find($id);
        if($recipe != null)
            return  $recipe->delete();
    }
}
