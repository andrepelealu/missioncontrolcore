<?php namespace Modules\#plural_name\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

/**
 * Class #nameRequest
 * @package Modules\#plural_name\Requests
 */
class #nameRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
