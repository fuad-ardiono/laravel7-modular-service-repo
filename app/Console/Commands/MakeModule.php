<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:make {module_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make module';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
    	if(!file_exists(base_path('app/Module/'.$this->argument('module_name')))) {
    		$module_name = $this->argument('module_name');
    		$service_name = strtolower($this->argument('module_name'))."_service";
			mkdir('app/Module/'.$this->argument('module_name'));

			$route_file = fopen(base_path('app/Module/'.$module_name.'/routes.php'), "w");
$routes_content = "<?php
use Illuminate\Support\Facades\Route;

Route::resource('".strtolower($module_name)."', '$module_name/Controller');
";

			fwrite($route_file, $routes_content);
			fclose($route_file);

			$contract_file = fopen(base_path('app/Module/'.$this->argument('module_name').'/Contract.php'), "w");
$contract_content = "<?php
namespace App\Module\\".$this->argument('module_name'). ";

interface Contract {

}
";

			fwrite($contract_file, $contract_content);
			fclose($contract_file);

			$service_file = fopen(base_path('app/Module/'.$this->argument('module_name').'/Service.php'), "w");
$service_content = "<?php
namespace App\Module\\".$this->argument('module_name'). ";

class Service implements Contract {

}
";
			fwrite($service_file, $service_content);
			fclose($service_file);

			$controller_file = fopen(base_path('app/Module/'.$this->argument('module_name').'/Controller.php'), "w");
$controller_content = "<?php
namespace App\Module\\".$this->argument('module_name'). ";

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use App\Module\\".$this->argument('module_name')."\\Contract as ". $this->argument('module_name') ."Service;
".

"
class Controller extends BaseController {
	private $$service_name;

	public function __construct(".$this->argument('module_name')."Service \$service) {
		\$this->$service_name = \$service;
	}

	public function index() {

	}

	public function store(Request \$request) {

	}

	public function update(\$id) {

	}

	public function destroy(\$id) {

	}
}
";
			fwrite($controller_file, $controller_content);
			fclose($controller_file);
		}
    }
}
