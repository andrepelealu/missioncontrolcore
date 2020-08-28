<?php namespace Eyeweb\MissionControl\Modules\Images\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

/**
 * Class ImageAttachRequest
 *
 * @package Eyeweb\MissionControl\Modules\Images\Requests
 */
class ImageAttachRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'model' => 'required',
            'images' => 'required'
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
