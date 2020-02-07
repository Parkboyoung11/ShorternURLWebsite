<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Url;

class RedirectController extends Controller {

    protected $url;

    public function __construct(Url $url) {
        $this->url = $url;
    }

    public function redirect($id) {
        $url = $this->url->where('id', $id)->first();
        if($url){
            return redirect()->to($url->link);
        }else {
            return redirect()->route('home');
        }
    }
}

