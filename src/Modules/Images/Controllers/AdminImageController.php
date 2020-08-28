<?php namespace Eyeweb\MissionControl\Modules\Images\Controllers;

use App\Http\Controllers\Controller;
use Eyeweb\MissionControl\Modules\Images\Models\Image;
use Eyeweb\MissionControl\Modules\Images\Repositories\ImageRepository;
use Eyeweb\MissionControl\Modules\Images\Requests\ImageAttachRequest;
use MissionControl\Images\Modules\Images\Requests\ImageUploadRequest;

/**
 * Class AdminImageController
 *
 * @package Eyeweb\MissionControl\Modules\Images\Controllers
 */
class AdminImageController extends Controller
{
    /**
     * @var ImageRepository
     */
    private $imageRepo;

    /**
     * AdminImageController constructor.
     * @param ImageRepository $imageRepo
     */
    function __construct(ImageRepository $imageRepo)
    {
        $this->imageRepo = $imageRepo;
    }

    /**
     * @param \Modules\Images\Controllers\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function attach(ImageAttachRequest $request)
    {
        $modelClass = $request->input('model');
        $model = $modelClass::find($request->input('id'));

        if($model) {
            $images = [];
            foreach($request->input('images') as $image) {
                $model->images()->save(new Image([
                    'original_filename' => $image['name'],
                    'filename' => $image['url']
                ]));
            }
        }
    }

    /**
     * @param \Eyeweb\MissionControl\Modules\Images\Models\Image $image
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Image $image)
    {
        $image->delete();

        return redirect()->back()
            ->with('flash_message', 'Image has successfully been deleted.')
            ->with('flash_message_type', 'success');
    }

}
