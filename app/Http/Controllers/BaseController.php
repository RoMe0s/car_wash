<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Libraries\Meta;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use YAAP\Theme\Facades\Theme;

class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $user = null;

    public $theme = 'default';

    //Массив з данными, который может быть вызыван методом $this->data(ключ, значение)
    public $data = array();

    //Массив с доступами в формате метод => доступ
    public $accessMap = array();

    function __construct()
    {
        $this->user = Auth::user();

        $this->fillMeta();

        Theme::init($this->theme);

    }

    /**
     * @param $key
     * @param $value
     */
    public function data($key, $value) {

        $this->data[$key] = $value;

    }

    /**
     * @param $view
     * @param array $data
     * @return string
     */
    public function render($view, $data = array()) {

        $data = array_merge($this->data, $data);

        return view($view)->with($data)->render();

    }

    /**
     * @param string $title
     */
    public function fillMeta(string $title = "")
    {

        $title = !empty($title) ? $title : config('app.name');

        Meta::title($title);
    }

}
