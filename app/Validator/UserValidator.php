<?php

namespace App\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserValidator
{
    /**
     * @var Request
     */
    private $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function validate()
    {
        return Validator::make($this->request->all(), $this->rules(), $this->messages());
    }

    public function rules()
    {
        return [
            "name"      => "required",
            "email"     => "required|email|unique:users,email,".$this->request->id,
            "password"  => "required",
        ];
    }

    private function messages()
    {
        return [];
    }
}
