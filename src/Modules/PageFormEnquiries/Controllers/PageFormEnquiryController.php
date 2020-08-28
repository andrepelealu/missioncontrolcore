<?php namespace Eyeweb\MissionControl\Modules\PageFormEnquiries\Controllers;

use App\Http\Controllers\Controller;
use Eyeweb\MissionControl\Modules\Newsletters\Facades\Newsletter;
use Eyeweb\MissionControl\Modules\PageFormEnquiries\Notifications\SendEnquiryNotification;
use Eyeweb\MissionControl\Modules\PageFormEnquiries\Repositories\PageFormEnquiryRepository;
use Eyeweb\MissionControl\Modules\PageFormEnquiries\Requests\CreatePageFormEnquiryRequest;
use Eyeweb\MissionControl\Modules\PageForms\Models\PageForm;
use Illuminate\Support\Str;

/**
 * Class PageFormEnquiryController
 * @package Eyeweb\MissionControl\Modules\PageFormEnquiries\Controllers
 */
class PageFormEnquiryController extends Controller
{
    /**
     * @var PageFormEnquiryRepository
     */
    private $pageFormEnquiryRepo;

    /**
     * PageFormEnquiryController constructor.
     * @param PageFormEnquiryRepository $pageFormEnquiryRepo
     */
    function __construct(PageFormEnquiryRepository $pageFormEnquiryRepo)
    {
        $this->pageFormEnquiryRepo = $pageFormEnquiryRepo;
    }

    /**
     * @param PageForm $pageformslug
     * @param CreatePageFormEnquiryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function enquire(PageForm $pageform, CreatePageFormEnquiryRequest $request)
    {
        $enquiry = $this->pageFormEnquiryRepo->create([
            'page_form_id' => $pageform->id,
            'referral_url' => url()->previous(),
            'fields' => $request->except('_token', config('honeypot.valid_from_field_name'), collect($request->all())->filter(function ($value, $key) {
                return Str::startsWith($key, config('honeypot.name_field_name'));
            })->keys()->first()),
            'email_from' => $pageform->email_from,
            'email_to' => $pageform->email_to,
            'ip_address' => $request->ip()
        ]);

        $enquiry->notify(new SendEnquiryNotification($enquiry));

        if($pageform->has_newsletter && (isset($enquiry->newsletterfields['agree_newsletter']) && $enquiry->newsletterfields['agree_newsletter'] == 'Yes')) {
            Newsletter::subscribe($pageform->newsletter_list_id, $enquiry->newsletterfields);
        }

        return redirect()->route('pageforms.thanks', $pageform);
    }

    /**
     * @param PageForm $pageform
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function thanks(PageForm $pageform)
    {
        return view('PageFormEnquiries::Frontend.thanks', compact('pageform'));
    }

}
