<?php namespace Eyeweb\MissionControl\Modules\Pages\Controllers;

use App\Http\Controllers\Controller;
use Eyeweb\MissionControl\Modules\PageForms\Repositories\PageFormRepository;
use Eyeweb\MissionControl\Modules\Pages\Repositories\PageRepository;
use Eyeweb\MissionControl\Modules\PageTemplateBlockContent\Models\PageTemplateBlockContent;
use Eyeweb\MissionControl\Modules\PageTemplates\Repositories\PageTemplateRepository;
use Eyeweb\MissionControl\Modules\Slideshow\Repositories\SlideshowRepository;
use Eyeweb\MissionControl\Modules\Pages\Models\Page;
use Eyeweb\MissionControl\Modules\Pages\Requests\PageRequest;
use Eyeweb\MissionControl\Modules\Pages\Requests\UpdatePageRequest;

/**
 * Class AdminPageController
 * @package Eyeweb\MissionControl\Modules\Pages\Controllers
 */
class AdminPageController extends Controller
{
    /**
     * @var PageRepository
     */
    private $pageRepo;

    /**
     * @var PageTemplateRepository
     */
    private $pageTemplateRepo;

    /**
     * @var SlideshowRepository
     */
    private $slideshowRepo;
    
    /**
     * @var PageFormRepository
     */
    private $pageFormRepo;

    /**
     * AdminPageController constructor.
     * @param PageRepository $pageRepo
     * @param PageTemplateRepository $pageTemplateRepo
     * @param SlideshowRepository $slideshowRepo
     * @param PageFormRepository $pageFormRepo
     */
    function __construct(PageRepository $pageRepo, PageTemplateRepository $pageTemplateRepo, SlideshowRepository $slideshowRepo, PageFormRepository $pageFormRepo)
    {
        $this->pageRepo = $pageRepo;
        $this->pageTemplateRepo = $pageTemplateRepo;
        $this->slideshowRepo = $slideshowRepo;
        $this->pageFormRepo = $pageFormRepo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $filter = request()->has('filter') ? request()->input('filter') : false;

        $pages = $this->pageRepo->getAllFiltered($filter, 40, 'updated_at', 'asc');

        return view('Pages::Admin.index', compact('pages', 'filter'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create()
    {
        if(!request()->has('template') or !is_numeric(request()->input('template'))) {
            $pageTemplates = $this->pageTemplateRepo->getAll();
            return view('Pages::Admin.choosetemplate', compact('pageTemplates'));
        }

        $template = $this->pageTemplateRepo->getById(request()->input('template'));
        $availableSlideshows = $this->slideshowRepo->getAll()->pluck('name', 'id')->prepend('No Slideshow', 0);
        $pageForms = $this->pageFormRepo->getAll()->pluck('name', 'id')->prepend('No Form', 0);

        return view('Pages::Admin.create', compact('template', 'availableSlideshows', 'pageForms'));
    }

    /**
     * @param PageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PageRequest $request)
    {
        if($page = $this->pageRepo->create($request->input())) {
            return redirect()
                ->route('mc-admin.pages.edit', $page->id)
                ->with('flash_message', 'The page was added successfully.')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param Page $page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function edit(Page $page)
    {
        $page = $this->pageRepo->getWithPageContent($page->id);

        $availableSlideshows = $this->slideshowRepo->getAll()->pluck('name', 'id')->prepend('No Slideshow', 0);
        $pageForms = $this->pageFormRepo->getAll()->pluck('name', 'id')->prepend('No Form', 0);

        return view('Pages::Admin.edit', compact('page', 'availableSlideshows', 'pageForms'));
    }

    /**
     * @param Page $page
     * @param PageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Page $page, UpdatePageRequest $request)
    {
        if($page = $this->pageRepo->update($page->id, $request->except('pagetemplateblockcontent'))) {
            if($request->has('pagetemplateblockcontent')) {
                if($pagetemplateblockcontentlanguages = $request->only('pagetemplateblockcontent')['pagetemplateblockcontent']) {
                    foreach($pagetemplateblockcontentlanguages as $languageCode =>
                            $pagetemplateblockcontentlanguageblocks) {
                        foreach($pagetemplateblockcontentlanguageblocks as $pagetemplateblockid =>
                                $pagetemplateblockcontentlanguageblock) {
                            foreach($pagetemplateblockcontentlanguageblocks as $pagetemplateblockcontentlanguageblock) {
                                PageTemplateBlockContent::updateOrCreate([
                                    'page_id' => $page->id,
                                    'page_tb_id' => $pagetemplateblockcontentlanguageblock['page_tb_id'],
                                    'language' => $languageCode,
                                ], [
                                    'content' => $pagetemplateblockcontentlanguageblock['content']
                                ]);
                            }
                        }
                    }
                }
            }
            return redirect()
                ->route('mc-admin.pages.edit', $page->id)
                ->with('flash_message', 'The page update was completed successfully .')
                ->with('flash_message_type', 'success');
        }

        return redirect()->back()->withInput()->withErrors();
    }

    /**
     * @param Page $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Page $page)
    {
        if($page->id != 1 && !$page->is_module) {
            if($this->pageRepo->delete($page->id, false)) {
                return redirect()
                    ->route('mc-admin.pages.index')
                    ->with('flash_message', 'The page was deleted')
                    ->with('flash_message_type', 'success');
            }
        }
        return back();
    }

    /**
     * @param Page $page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function confirmDelete(Page $page)
    {
        if($page->id != 1 && !$page->is_module) {
            $destroyRoute = route('mc-admin.pages.destroy', $page->id);
            return view('Admins::Admin.partials.confirm-delete', compact('destroyRoute'));
        }
        abort(404);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        if($this->pageRepo->restore($id)) {
            return redirect()
                ->route('mc-admin.pages.index')
                ->with('flash_message', 'The page was restored')
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
        $page = $this->pageRepo->getById($id);
        $restoreRoute = route('mc-admin.pages.restore', $page->id);
        return view('Admins::Admin.partials.confirm-restore', compact('restoreRoute'));
    }
	
	/**
	 * @return mixed
	 */
    public function search()
	{
		$terms = request()->input('terms');
		
		$results = $this->pageRepo->searchByTitle($terms, 10)->each(function($item, $key) {
			$item->id = $item->id;
			$item->value = $item->title;
		});
		
		if(request()->ajax()) {
			return $results;
		}
	}
}
