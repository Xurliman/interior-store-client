<?php

namespace App\Http\Controllers;

use App\Http\Resources\Scene\SceneResource;
use App\Models\Scene;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class SceneController extends Controller
{
    public function index(): View|Factory|Application
    {
        $scenes = SceneResource::collection(Scene::with('views')->get());
        return view('scenes.index', compact('scenes'));
    }

    public function show(Scene $scene): View|Factory|Application
    {
        $scene = SceneResource::make($scene->load('views'));
        return view('scenes.show', compact('scene'));
    }
}
