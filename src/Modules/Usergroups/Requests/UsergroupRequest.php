<?php namespace Eyeweb\MissionControl\Modules\Usergroups\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

/**
 * Class UsergroupRequest
 * @package Eyeweb\MissionControl\Modules\Usergroups\Requests
 */
class UsergroupRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
