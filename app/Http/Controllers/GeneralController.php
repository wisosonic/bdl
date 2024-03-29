<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Session;

class GeneralController extends Controller
{
    public $language;
    public $alt_languages;
    public $alt_languages_tr;

    public $all_languages = ["en", "ar"];
    public $all_languages_tr = array(
      "en" => "English",
      "ar" => "عربي"
    );

    public function __construct(Request $request) {
        if ($request->has('lang')) {
            Session::put("lang", $request->input("lang"));
        } else {
            Session::put("lang", "en");
        }
        $this->language = Session::get("lang");
        $this->alt_languages = array_values(array_diff( $this->all_languages, [$this->language] ));
        $this->alt_languages_tr = [];
        foreach ($this->alt_languages as $key => $l) {
            array_push($this->alt_languages_tr, $this->all_languages_tr[$l]);
        }
        View::share('lang', $this->language);
        View::share('alt_lang', $this->alt_languages);
        View::share('alt_lang_tr', $this->alt_languages_tr);
    }
}