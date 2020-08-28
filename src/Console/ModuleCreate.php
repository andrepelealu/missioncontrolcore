<?php namespace Eyeweb\MissionControl\Console;

use Carbon\Carbon;
use Illuminate\Console\Command;
use File;
use Illuminate\Support\Str;

/**
 * Class ModuleCreate
 * @package Eyeweb\MissionControl\Console
 */
class ModuleCreate extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'module:create';

    /**
     * The console command description.
     * @var string
     */
    protected $description = 'Create module template.';

    /**
     * InstallMC constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('What is the name of the module?');

        $name = Str::singular($name);
        $plural_name = Str::plural($name);

        // Make all Directories
        File::makeDirectory('modules/' . ucfirst($plural_name));
        File::makeDirectory('modules/' . ucfirst($plural_name) . '/Controllers');
        File::makeDirectory('modules/' . ucfirst($plural_name) . '/Models');
        File::makeDirectory('modules/' . ucfirst($plural_name) . '/Presenters');
        File::makeDirectory('modules/' . ucfirst($plural_name) . '/Repositories');
        File::makeDirectory('modules/' . ucfirst($plural_name) . '/Requests');
        File::makeDirectory('modules/' . ucfirst($plural_name) . '/Resources');
        File::makeDirectory('modules/' . ucfirst($plural_name) . '/Resources/Views');
        File::makeDirectory('modules/' . ucfirst($plural_name) . '/Resources/Views/Admin');
        File::makeDirectory('modules/' . ucfirst($plural_name) . '/Resources/Views/Frontend');
        File::makeDirectory('modules/' . ucfirst($plural_name) . '/Resources/Assets');
        File::makeDirectory('modules/' . strtolower($plural_name) . '/Routes');

        // create model
        $model = $this->createModuleFile('Models/ModuleModel', 'Models/' . $name, $name, $plural_name);

        // create admin controller
        $admin_controller = $this->createModuleFile('Controllers/ModuleAdminController', 'Controllers/Admin' . $name . 'Controller', $name, $plural_name);

        // create controller
        $controller = $this->createModuleFile('Controllers/ModuleController', 'Controllers/' . $name . 'Controller', $name, $plural_name);

        // create eloquent repository
        $eloquentrepository = $this->createModuleFile('Repositories/ModuleRepository', 'Repositories/' . $name . 'Repository', $name, $plural_name);

        // create repository interface
        $repositoryinterface = $this->createModuleFile('Repositories/ModuleInterface', 'Repositories/' . $name . 'Interface', $name, $plural_name);

        // create form request
        $formrequest = $this->createModuleFile('Requests/ModuleRequest', 'Requests/' . $name . 'Request', $name, $plural_name);

        // create presenter
        $presenter = $this->createModuleFile('Presenters/ModulePresenter', 'Presenters/' . $name . 'Presenter', $name, $plural_name);

        // create views
        $create = $this->createViewFile('create', 'create', $name, $plural_name);
        $dit = $this->createViewFile('edit', 'edit', $name, $plural_name);
        $exampleform = $this->createViewFile('form', 'form', $name, $plural_name);
        $index = $this->createViewFile('index', 'index', $name, $plural_name);
        $submenu = $this->createViewFile('sub-menu', 'sub-menu', $name, $plural_name);

        // create route
        $adminroute = $this->createRouteFile($name, $plural_name);

        // create migration
        $migration = $this->createMigrationFile('create_module_table', $name, $plural_name);

        // add to nav instructions
        $this->info('Copy and paste this into : modules/Admins/Resources/Views/Admin/partials/navigation.php');

        $this->comment(PHP_EOL . '@if(auth()->guard(\'admins\')->user()->admingroup->hasPermission(\'mc-admin.' . strtolower($plural_name) . '.index\'))' . PHP_EOL . '    <li><a href="{{ route(\'mc-admin.' . strtolower($plural_name) . '.index\') }}" class="{{ set_active(\'mc-admin/' . strtolower($plural_name) . '*\') }}">' . ucfirst(preg_replace('/(?<!\ )[A-Z]/', ' $0', $plural_name)) . '</a></li>' . PHP_EOL . '@endif' . PHP_EOL);
    }

    /**
     * @param $file
     * @param $new_filename
     * @param $name
     * @param $plural_name
     */
    public function createModuleFile($file, $new_filename, $name, $plural_name)
    {
        $file = File::get('vendor/eyeweb/missioncontrolcore/src/Console/ModuleTemplate/' . $file . '.tpl.php');
        $file = str_replace('#name_spaces', preg_replace('/(?<!\ )[A-Z]/', ' $0', ucfirst($name)), $file);
        $file = str_replace('#plural_name_spaces', preg_replace('/(?<!\ )[A-Z]/', ' $0', ucfirst($plural_name)), $file);
        $file = str_replace('#strtolower_name_spaces', strtolower(preg_replace('/(?<!\ )[A-Z]/', ' $0', $name)), $file);
        $file = str_replace('#strtolower_plural_name_spaces', strtolower(preg_replace('/(?<!\ )[A-Z]/', ' $0', $plural_name)), $file);
        $file = str_replace('#name', ucfirst($name), $file);
        $file = str_replace('#plural_name', ucfirst($plural_name), $file);
        $file = str_replace('#strtolower_name', strtolower($name), $file);
        $file = str_replace('#strtolower_plural_name', strtolower($plural_name), $file);
        File::put('modules/' . ucfirst($plural_name) . '/' . $new_filename . '.php', $file);
    }

    /**
     * @param $file
     * @param $new_filename
     * @param $name
     * @param $plural_name
     */
    public function createViewFile($file, $new_filename, $name, $plural_name)
    {
        $file = File::get('vendor/eyeweb/missioncontrolcore/src/Console/ModuleTemplate/Resources/Views/Admin/' . $file . '.tpl.php');
        $file = str_replace('#name_spaces', preg_replace('/(?<!\ )[A-Z]/', ' $0', ucfirst($name)), $file);
        $file = str_replace('#plural_name_spaces', preg_replace('/(?<!\ )[A-Z]/', ' $0', ucfirst($plural_name)), $file);
        $file = str_replace('#strtolower_name_spaces', strtolower(preg_replace('/(?<!\ )[A-Z]/', ' $0', $name)), $file);
        $file = str_replace('#strtolower_plural_name_spaces', strtolower(preg_replace('/(?<!\ )[A-Z]/', ' $0', $plural_name)), $file);
        $file = str_replace('#name', ucfirst($name), $file);
        $file = str_replace('#plural_name', ucfirst($plural_name), $file);
        $file = str_replace('#strtolower_name', strtolower($name), $file);
        $file = str_replace('#strtolower_plural_name', strtolower($plural_name), $file);
        File::put('modules/' . ucfirst($plural_name) . '/Resources/Views/Admin/' . $new_filename . '.blade.php', $file);
    }

    /**
     * @param $name
     * @param $plural_name
     */
    public function createRouteFile($name, $plural_name)
    {
        $file = File::get('vendor/eyeweb/missioncontrolcore/src/Console/ModuleTemplate/Routes/Web.tpl.php');
        $file = str_replace('#name_spaces', preg_replace('/(?<!\ )[A-Z]/', ' $0', ucfirst($name)), $file);
        $file = str_replace('#plural_name_spaces', preg_replace('/(?<!\ )[A-Z]/', ' $0', ucfirst($plural_name)), $file);
        $file = str_replace('#strtolower_name_spaces', strtolower(preg_replace('/(?<!\ )[A-Z]/', ' $0', $name)), $file);
        $file = str_replace('#strtolower_plural_name_spaces', strtolower(preg_replace('/(?<!\ )[A-Z]/', ' $0', $plural_name)), $file);
        $file = str_replace('#name', ucfirst($name), $file);
        $file = str_replace('#plural_name', ucfirst($plural_name), $file);
        $file = str_replace('#strtolower_name', strtolower($name), $file);
        $file = str_replace('#strtolower_plural_name', strtolower($plural_name), $file);
        File::put('modules/' . ucfirst($plural_name) . '/Routes/Web.php', $file);
    }

    /**
     * @param $file
     * @param $name
     * @param $plural_name
     */
    public function createMigrationFile($file, $name, $plural_name)
    {
        $file = File::get('vendor/eyeweb/missioncontrolcore/src/Console/ModuleTemplate/Migration/' . $file . '.tpl.php');
        $file = str_replace('#name', ucfirst($name), $file);
        $file = str_replace('#plural_name', ucfirst($plural_name), $file);
        $file = str_replace('#strtolower_name', strtolower($name), $file);
        $file = str_replace('#strtolower_plural_name', strtolower($plural_name), $file);
        $new_filename = Carbon::now()->format('Y_m_d_His') . '_create_' . strtolower($plural_name) . '_table';
        File::put('database/migrations/' . $new_filename . '.php', $file);
    }
}
