<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoEditingController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Video Editing | SIHUMAS',
            'page' => 'Video Editing',
            'level' => 'Admin'
        ];
        return view('pages.admin.kelola_video_editing.video_editing',$data);
    }
}
