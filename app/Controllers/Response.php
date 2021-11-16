<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Response extends BaseController
{
    public function index()
    {
        return view('response/index');
    }

    public function konfirmasi( $judul, $content,$link_left, $text_link_left,$link_right, $text_link_right){
        $d=[
            'judul'=>$judul,
            'content'=> $content,
            'link_left'=>$link_left,
            'text_link_left'=> $text_link_left,
            'link_right'=>$link_right,
            'text_link_right'=>$text_link_right,
        ];

        return view('response/konfirmasi',$d);
    }
}
