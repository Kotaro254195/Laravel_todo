<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about(){
        $title="About us";
        return view("pages.about")->with("title",$title);
    }

    public function services(){
        $data=["title"=>"services",
                "services"=>["web design","Programming","animation"]
        ];

        return view("pages.services")->with($data);
    }

    public function pushme(){
        // $word="I was pushed";
        // return view("pages.pushme")->with("word",$word);
        $words=["title"=>"You Pushed Me!!! ",
                "list"=>["element1","element2","element3","element4","element5"],
                "urls"=>["google"=>"https://www.google.co.jp/",
                         "yahoo"=>"https://www.yahoo.co.jp/",
                         "bing"=>"https://www.bing.com/",
                         "msn"=>"https://www.msn.com/ja-jp",
                         "excite"=>"https://www.excite.co.jp/"]];
        return view("pages.pushme")->with($words);
    }

}
