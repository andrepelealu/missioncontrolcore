<?php namespace Eyeweb\MissionControl\Modules\Slideshow\Controllers;

use App\Http\Controllers\Controller;
use Eyeweb\MissionControl\Modules\Slideshow\Models\Slideshow;
use Eyeweb\MissionControl\Modules\Slideshow\Repositories\SlideshowRepository;
use Eyeweb\MissionControl\Modules\SlideshowImage\Repositories\SlideshowImageRepository;
use Eyeweb\MissionControl\Modules\Slideshow\Requests\SlideshowRequest;

/**
 * Class AdminSlideshowController
 * @package Eyeweb\MissionControl\Modules\Slideshow\Controllers
 */
class AdminSlideshowController extends Controller
{
    /**
     * @var SlideshowRepository
     */
    private $slideshowRepo;

    /**
     * @var SlideshowImageRepository
     */
    private $slideRepo;

    /**
     * AdminSlideshowController constructor.
     * @param SlideshowImageRepository $slideRepo
     * @param SlideshowRepository $slideshowRepo
     */
    function __construct(SlideshowImageRepository $slideRepo, SlideshowRepository $slideshowRepo)
    {
        $this->slideRepo = $slideRepo;
        $this->slideshowRepo = $slideshowRepo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $filter = request()->has('filter') ? request()->input('filter') : false;

        $slideshows = $this->slideshowRepo->getAllFiltered($filter, 10, 'updated_at', 'asc');

        return view('Slideshow::Admin.index', compact('slideshows', 'filter'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create()
    {
        return view('Slideshow::Admin.create');
    }

    /**
     * @param SlideshowRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SlideshowRequest $request)
    {
        if($slideshow = $this->slideshowRepo->create($request->input())) {
            return redirect()
                ->route('mc-admin.slideshows.edit', $slideshow->id)
                ->with('flash_message', 'The slideshow was added successfully.')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param Slideshow $slideshow
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function edit(Slideshow $slideshow)
    {
        return view('Slideshow::Admin.edit', compact('slideshow'));
    }

    /**
     * @param Slideshow $slideshow
     * @param SlideshowRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Slideshow $slideshow, SlideshowRequest $request)
    {
        if($this->slideshowRepo->update($slideshow->id, $request->input())) {
            return redirect()
                ->route('mc-admin.slideshows.edit', $slideshow->id)
                ->with('flash_message', 'The slideshow update was completed.')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param Slideshow $slideshow
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Slideshow $slideshow)
    {
        if($this->slideshowRepo->delete($slideshow->id)) {
            return redirect()
                ->route('mc-admin.slideshows.index')
                ->with('flash_message', 'The slideshow was deleted')
                ->with('flash_message_type', 'success');
        }
        return back();
    }

    /**
     * @param Slideshow $slideshow
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function confirmDelete(Slideshow $slideshow)
    {
        $destroyRoute = route('mc-admin.slideshows.destroy', $slideshow->id);
        return view('Admins::Admin.partials.confirm-delete', compact('destroyRoute'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        if($this->slideshowRepo->restore($id)) {
            return redirect()
                ->route('mc-admin.slideshows.index')
                ->with('flash_message', 'The slideshow was restored')
                ->with('flash_message_type', 'success');
        }
        return back();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function confirmRestore($id)
    {
        $slideshow = $this->slideshowRepo->getById($id);
        $restoreRoute = route('mc-admin.slideshows.restore', $slideshow->id);
        return view('Admins::Admin.partials.confirm-restore', compact('restoreRoute'));
    }
}
