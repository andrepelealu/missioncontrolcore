<?php namespace Eyeweb\MissionControl\Modules\PageTemplateBlocks\Controllers;

use App\Http\Controllers\Controller;
use Eyeweb\MissionControl\Modules\PageTemplateBlocks\Models\PageTemplateBlock;
use Eyeweb\MissionControl\Modules\PageTemplates\Models\PageTemplate;
use Eyeweb\MissionControl\Modules\PageTemplateBlocks\Requests\PageTemplateBlockRequest;
use Eyeweb\MissionControl\Modules\PageTemplates\Repositories\PageTemplateRepository;
use Eyeweb\MissionControl\Modules\PageTemplateBlocks\Repositories\PageTemplateBlockRepository;

/**
 * Class AdminPageTemplateBlockController
 * @package Eyeweb\MissionControl\Modules\PageTemplateBlocks\Controllers
 */
class AdminPageTemplateBlockController extends Controller
{
    /**
     * @var PageTemplateBlockRepository
     */
    private $pageTemplateBlockRepo;

    /**
     * @var PageTemplateRepository
     */
    private $pageTemplateRepo;

    /**
     * AdminPageTemplateBlockController constructor.
     * @param PageTemplateBlockRepository $pageTemplateBlockRepo
     * @param PageTemplateRepository $pageTemplateRepo
     */
    function __construct(PageTemplateBlockRepository $pageTemplateBlockRepo, PageTemplateRepository $pageTemplateRepo)
    {
        $this->pageTemplateBlockRepo = $pageTemplateBlockRepo;
        $this->pageTemplateRepo = $pageTemplateRepo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $filter = request()->has('filter') ? request()->input('filter') : false;

        $pagetemplateblocks = $this->pageTemplateBlockRepo->getAllFiltered($filter, false, 'id', 'asc');

        return view('PageTemplateBlocks::Admin.index', compact('pagetemplateblocks', 'filter'));
    }

    /**
     * @param PageTemplate $pagetemplate
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create(PageTemplate $pagetemplate)
    {
        return view('PageTemplateBlocks::Admin.create', compact('pagetemplate'));
    }

    /**
     * @param PageTemplate $pagetemplate
     * @param PageTemplateBlockRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PageTemplate $pagetemplate, PageTemplateBlockRequest $request)
    {
        $input = $request->input();
        $input['pagetemplate_id'] = $pagetemplate->id;
        if($pagetemplateblock = $this->pageTemplateBlockRepo->create($input)) {
            if($input['type'] == 'image') {
                // if image, add an alt text field as well
                $input['type'] = 'text';
                $input['name'] = $input['name'] . ' Alt Text';
                $input['field_name'] = $input['field_name'] . '_alt_text';
                $pagetemplateblockalttext = new PageTemplateBlock($input);
                $pagetemplateblockalttext->save();
            }
            return redirect()
                ->route('mc-admin.pagetemplates.edit', $pagetemplate->id)
                ->with('flash_message', 'The template block was added successfully.')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param PageTemplate $pagetemplate
     * @param PageTemplateBlock $pagetemplateblock
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function edit(PageTemplate $pagetemplate, PageTemplateBlock $pagetemplateblock)
    {
        return view('PageTemplateBlocks::Admin.edit', compact('pagetemplate', 'pagetemplateblock'));
    }

    /**
     * @param PageTemplate $pagetemplate
     * @param PageTemplateBlock $pagetemplateblock
     * @param PageTemplateBlockRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PageTemplate $pagetemplate, PageTemplateBlock $pagetemplateblock, PageTemplateBlockRequest $request)
    {
        if($this->pageTemplateBlockRepo->update($pagetemplateblock->id, $request->input())) {
            return redirect()
                ->route('mc-admin.pagetemplates.edit', $pagetemplate->id)
                ->with('flash_message', 'The page block update was completed.')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param PageTemplate $pagetemplate
     * @param PageTemplateBlock $pagetemplateblock
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(PageTemplate $pagetemplate, PageTemplateBlock $pagetemplateblock)
    {
        if($this->pageTemplateBlockRepo->delete($pagetemplateblock->id)) {
            return redirect()
                ->route('mc-admin.pagetemplates.edit', $pagetemplate->id)
                ->with('flash_message', 'The template block was deleted')
                ->with('flash_message_type', 'success');
        }
        return back();
    }

    /**
     * @param PageTemplate $pagetemplate
     * @param PageTemplateBlock $pagetemplateblock
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function confirmDelete(PageTemplate $pagetemplate, PageTemplateBlock $pagetemplateblock)
    {
        $destroyRoute = route('mc-admin.pagetemplateblocks.destroy', $pagetemplateblock->id);
        return view('Admins::Admin.partials.confirm-delete', compact('destroyRoute'));
    }
}
