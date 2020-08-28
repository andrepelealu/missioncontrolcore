<?php namespace Eyeweb\MissionControl\Modules\Admingroups\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

/**
 * Class AdmingroupRequest
 * @package Eyeweb\MissionControl\Modules\Admingroups\Requests
 */
class AdmingroupRequest extends Request
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
     * Determine if the admin is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
