<?php

namespace App\Http\Controllers;

use App\Services\Implementations\UserService;
use App\Validator\UserValidator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * @var Request
     */
    private $request;
    /**
     * @var UserValidator
     */
    private $userValidator;

    public function __construct(UserService $userService, Request $request, UserValidator $userValidator) {
        $this->request = $request;
        $this->userService = $userService;
        $this->userValidator = $userValidator;
    }

    public function index()
    {
        return $this->userService->all();
    }

    public function show($id)
    {
        return $this->userService->getById($id);
    }

    public function store()
    {
        $response = response("",201);
        $validator = $this->userValidator->validate();

        if($validator->fails()){
            $response = response([
                "status" => 422,
                "message" => "Error",
                "errors" => $validator->errors()
            ], 422);
        }else{
            $this->userService->create($this->request->all());
        }

        return $response;

    }
    public function update($id)
    {
        $response = response("", 202);

        $validator = $this->userValidator->validate();

        if($validator->fails()){
            $response = response([
                "status" => 422,
                "message" => "Error",
                "errors" => $validator->errors()
            ], 422);
        }else{
            $data = $this->userService->update($this->request->all(), $id);
            if($data == null)
                $response = response([
                    "status" => 404,
                    "message" => "Error",
                    "errors" => "user not found"
                ], 404);
        }

        return $response;

    }
    public function destroy($id)
    {
        $this->userService->destroy($id);
        return response("", 204);
    }
}
