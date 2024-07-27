<?php

namespace App\Http\Controllers;

use App\Models\Pemilih;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
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
        if($data = Pemilih::find($request->key)){
            return $data;
        }

        $this->protectRequest('search:'.$request->ip(), 5);
        $this->protectRequest('search-global', 120);

        throw new ModelNotFoundException();
    }

    private function protectRequest(string $key, int $limit)
    {
        if (RateLimiter::tooManyAttempts($key, $limit)) {
            abort(400, sprintf('Terlalu banyak permintaan, tunggu %s detik lagi.', RateLimiter::availableIn($key)));
        }

        RateLimiter::increment($key);
    }
}
