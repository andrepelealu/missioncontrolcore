<?php namespace Modules\#plural_name\Controllers;

use App\Http\Controllers\Controller;
use Modules\#plural_name\Repositories\#nameRepository;

/**
 * Class #nameController
 * @package Modules\#plural_name\Controllers
 */
class #nameController extends Controller
{
    /**
     * @var #nameRepository
     */
    private $#strtolower_nameRepo;

    /**
     * #nameController constructor.
     * @param #nameRepository $#strtolower_nameRepo
     */
    function __construct(
        #nameRepository $#strtolower_nameRepo
    )
    {
        $this->#strtolower_nameRepo = $#strtolower_nameRepo;
    }
}