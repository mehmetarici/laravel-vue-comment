<?php

namespace App\Http\Requests;

class CreateCommentRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'parent_id' => 'sometimes|exists:comments,id',
            'body' => 'required|string|max:65535',
            'username' => 'required|string|max:255',
        ];
    }

}
