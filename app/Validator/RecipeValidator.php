<?php

namespace App\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RecipeValidator
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
            "title"         => "required",
            "description"   => "required",
            "ingredients"   => "required",
            "user_id"       => "required|exists:App\Models\User,id",
        ];
    }

    public function messages()
    {
        return [];
    }
}
