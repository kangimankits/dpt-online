<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CoreController extends Controller
{
    public function __invoke(Request $request)
    {
        if(! $request->isMethod('GET') && ! $request->ajax()){
            throw new NotFoundHttpException();
        }

        return match($request->method()){
            'GET' => view('index'),
            'POST' => $this->search($request)
        };
    }

    private function search(Request $request)
    {

    }
}
