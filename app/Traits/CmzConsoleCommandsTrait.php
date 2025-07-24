<?php

namespace App\Traits;
use Illuminate\Support\Facades\File;

trait CmzConsoleCommandsTrait
{
    public function handleController($name, $path)
    {
        $basePath = app_path('Http/Modules/'.$path.'/Controllers'); // <- Carpeta personalizada
        $controllerPath = $basePath . '/' . $name . '.php';

        // Crear carpeta si no existe
        if (!File::exists($basePath)) {
            File::makeDirectory($basePath, 0755, true);
        }

        // Verificar si ya existe
        if (File::exists($controllerPath)) {
            $this->error("El controlador '{$name}' ya existe en el directorio.");
            return 1;
        }

        $path = str_replace('/',"\\",$path);

        // Generar contenido básico
        $namespace = "App\\Http\\Modules\\{$path}\\Controllers";
        $stub = <<<PHP
        <?php

        namespace {$namespace};

        use App\Http\Controllers\Controller;
        use Illuminate\Http\Request;

        class {$name} extends Controller
        {
            //
        }
        PHP;

        File::put($controllerPath, $stub);
        $this->info("Controlador '{$name}' creado en '{$controllerPath}/Controllers' .");
        return 0;
    }

    public function handleRequest($name, $path)
    {
        $basePath = app_path('Http/Modules/'.$path.'/Requests'); // <- Carpeta personalizada
        $controllerPath = $basePath . '/' . $name . '.php';

        // Crear carpeta si no existe
        if (!File::exists($basePath)) {
            File::makeDirectory($basePath, 0755, true);
        }

        // Verificar si ya existe
        if (File::exists($controllerPath)) {
            $this->error("El request '{$name}' ya existe en el directorio.");
            return 1;
        }

        $path = str_replace('/',"\\",$path);

        // Generar contenido básico
        $namespace = "App\\Http\\Modules\\{$path}\\Requests";
        $stub = <<<'PHP'
        <?php

        namespace {$namespace};

        use App\Http\Modules\Shared\Utils\ApiResponseUtil;
        use Illuminate\Foundation\Http\FormRequest;
        use Illuminate\Contracts\Validation\Validator;

        class {$name} extends FormRequest
        {
            /**
             * Determine if the user is authorized to make this request.
             *
             * @return bool
             */
            public function authorize()
            {
                return true;
            }

            public function prepareForValidation()
            {

            }

            /**
             * Get the validation rules that apply to the request.
             *
             * @return array
            */

            public function rules()
            {
                return [];
            }

            public function messages()
            {
                return [];
            }

            protected function failedValidation(Validator $validator)
            {
                throw ApiResponseUtil::validation($validator->errors());
            }
        }
        PHP;

        File::put($controllerPath, $stub);
        $this->info("Request '{$name}' creado en '{$controllerPath}/Request' .");
        return 0;
    }

    public function handleMiddleware($name, $path)
    {
        $basePath = app_path('Http/Modules/'.$path.'/Middlewares'); // <- Carpeta personalizada
        $controllerPath = $basePath . '/' . $name . '.php';

        // Crear carpeta si no existe
        if (!File::exists($basePath)) {
            File::makeDirectory($basePath, 0755, true);
        }

        // Verificar si ya existe
        if (File::exists($controllerPath)) {
            $this->error("El middleware '{$name}' ya existe en el directorio.");
            return 1;
        }

        $path = str_replace('/',"\\",$path);

        // Generar contenido básico
        $namespace = "App\\Http\\Modules\\{$path}\\Middlewares";

        $stub = <<<'PHP'
        <?php

        namespace {$namespace};

        use Illuminate\Foundation\Http\FormRequest;
        use Closure;

        class {$name} extends FormRequest
        {
            /**
                * Handle an incoming request.
                *
                * @param  \Illuminate\Http\Request  $request
                * @param  \Closure  $next
                * @return mixed
            */
            public function handle($request, Closure $next)
            {
                if ($this->verifyRule()) {
                    return $next($request);
                }
            }

            private function verifyRule()
            {

            }
        }
        PHP;

        $stub = str_replace(
            ['{$namespace}', '{$name}'],
            [$namespace, $name],
            $stub
        );

        File::put($controllerPath, $stub);
        $this->info("Middleware '{$name}' creado en '{$controllerPath}/Middlewares' .");
        return 0;
    }

    public function handleModel($name, $path, $table = null, $fields = "['tkn']")
    {
        $table = (!$table)?$this->setNameTable(str_replace('Model','',$name)):$table;
        $basePath = app_path('Http/Modules/'.$path); // <- Carpeta personalizada
        $controllerPath = $basePath . '/' . $name . '.php';

        // Crear carpeta si no existe
        if (!File::exists($basePath)) {
            File::makeDirectory($basePath, 0755, true);
        }

        // Verificar si ya existe
        if (File::exists($controllerPath)) {
            $this->error("El model '{$name}' ya existe en el directorio.");
            return 1;
        }

        $path = str_replace('/',"\\",$path);

        // Generar contenido básico
        $namespace = "App\\Http\\Modules\\{$path}";

        $stub = <<<'PHP'
        <?php

        namespace {$namespace};

        use Illuminate\Database\Eloquent\Model;

        class {$name} extends Model {
            ###CONFIGURACION
                protected $table = "{$table}";
                protected $fillable = {$fields};

            ###RELACIONES

            ###CRUD
                public function crear($request)
                {
                    # code...
                }

                public function actualizar($request)
                {
                    # code...
                }

                public function anular($request)
                {
                    # code...
                }

            ###LOGICA

            ###SCOPES

            ###ATTRIBUTES
        }
        PHP;

        $stub = str_replace(
            ['{$namespace}', '{$name}', '{$table}', '{$fields}'],
            [$namespace, $name, $table, $fields],
            $stub
        );

        File::put($controllerPath, $stub);
        $this->info("Model '{$name}' creado en '{$controllerPath}' .");
        return 0;
    }

    function setNameTable($name)
    {
        preg_match_all('/[A-Z]/', $name, $matches, PREG_OFFSET_CAPTURE);
        $texto = $name;
        if (count($matches[0]) >= 2) {
            $segundaMayuscula = $matches[0][1][1];
            $texto = substr_replace($texto, '_', $segundaMayuscula, 0);
        }

        return strtolower($texto);
    }
}
