<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodRequest extends FormRequest
{
  public function authorize(): bool
  {
      return true;
  }

  public function rules(): array
  {
    return ['count' => 'integer|min:0'];
  }
}