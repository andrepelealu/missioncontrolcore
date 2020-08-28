<?php namespace Modules\#plural_name\Controllers;

use App\Http\Controllers\Controller;
use Modules\#plural_name\Repositories\#nameRepository;
use Modules\#plural_name\Requests\#nameRequest;
use Modules\#plural_name\Models\#name;

/**
 * Class Admin#nameController
 * @package Modules\#plural_name\Controllers
 */
class Admin#nameController extends Controller
{
    /**
     * @var #nameRepository
     */
    private $#strtolower_nameRepo;

    /**
     * Admin#nameController constructor.
     * @param #nameRepository $#strtolower_nameRepo
     */
    function __construct(#nameRepository $#strtolower_nameRepo)
    {
        $this->#strtolower_nameRepo = $#strtolower_nameRepo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $filter = request()->has('filter') ? request()->input('filter') : false;

        $#strtolower_plural_name = $this->#strtolower_nameRepo->getAllFiltered($filter, 10, 'id', 'asc');

        return view('#plural_name::Admin.index', compact('#strtolower_plural_name', 'filter'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create()
    {
        return view('#plural_name::Admin.create');
    }

    /**
     * @param #nameRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(#nameRequest $request)
    {
        if ($#strtolower_name = $this->#strtolower_nameRepo->create($request->input())) {
              return redirect()->route('mc-admin.#strtolower_plural_name.edit', $#strtolower_name->id)
                  ->with('flash_message', 'The#strtolower_name_spaces was added successfully.')
                  ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param #name $#strtolower_name
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function edit(#name $#strtolower_name)
    {
        return view('#plural_name::Admin.edit', compact('#strtolower_name'));
    }

    /**
     * @param #name $#strtolower_name
     * @param #nameRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(#name $#strtolower_name, #nameRequest $request)
    {
        if ($this->#strtolower_nameRepo->update($#strtolower_name->id, $request->input())){
            return back()
                ->with('flash_message', 'The#strtolower_name_spaces update was completed successfully .')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @param #name $#strtolower_name
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(#name $#strtolower_name)
    {
        if ($this->#strtolower_nameRepo->delete($#strtolower_name->id)) {
            return redirect()->route('mc-admin.#strtolower_plural_name.index')
                ->with('flash_message', 'The#strtolower_name_spaces was deleted')
                ->with('flash_message_type', 'success');
        }
        return back();
    }

    /**
     * @param #name $#strtolower_name
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function confirmDelete(#name $#strtolower_name)
    {
        $destroyRoute = route('mc-admin.#strtolower_plural_name.destroy', $#strtolower_name->id);
        return view('Admins::Admin.partials.confirm-delete', compact('destroyRoute'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        if ($this->#strtolower_nameRepo->restore($id)) {
             return redirect()->route('mc-admin.#strtolower_plural_name.index')
                 ->with('flash_message', 'The#strtolower_name_spaces was restored')
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
        $#strtolower_name = $this->#strtolower_nameRepo->getById($id);
        $restoreRoute = route('mc-admin.#strtolower_plural_name.restore', $#strtolower_name->id);
        return view('Admins::Admin.partials.confirm-restore', compact('restoreRoute'));
    }
}
