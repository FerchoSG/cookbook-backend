<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Implementations\RecipeService;
use App\Validator\RecipeValidator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * @var RecipeService
     */
    private $recipeService;

    /**
     * @var Request
     */
    private $request;
    /**
     * @var RecipeValidator
     */
    private $recipeValidator;

    public function __construct(RecipeService $recipeService, Request $request, RecipeValidator $recipeValidator) {
        $this->request = $request;
        $this->recipeService = $recipeService;
        $this->recipeValidator = $recipeValidator;
    }

    public function index()
    {
        $currentUser = Auth::user();
        return $this->recipeService->all($currentUser->id);
    }

    public function show($id)
    {
        return $this->recipeService->getById($id);
    }

    public function store()
    {
        $response = response("",201);
        $path = '';
        if($this->request->hasFile('file')){
            $fileExt = $this->request->file('file')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$fileExt;
            $path = storage_path('images/');
            $this->request->file('file')->move($path, $fileName);
            $this->request['image'] = $path . $fileName;
        }

        $validator = $this->recipeValidator->validate();

        if($validator->fails()){
            $response = response([
                "status" => 422,
                "message" => "Error",
                "errors" => $validator->errors()
            ], 422);
        }else{
            $this->recipeService->create($this->request->all());
        }

        return $response;

    }

    public function update($id)
    {
        $response = response("", 202);

        $validator = $this->recipeValidator->validate();

        if($validator->fails()){
            $response = response([
                "status" => 422,
                "message" => "Error",
                "errors" => $validator->errors()
            ], 422);
        }else{
            $data = $this->recipeService->update($this->request->all(), $id);
            if($data == null)
                $response = response([
                    "status" => 404,
                    "message" => "Error",
                    "errors" => "recipe not found"
                ], 404);
        }

        return $response;

    }

    public function destroy($id)
    {
        $this->recipeService->destroy($id);
        return response("", 204);
    }
}
