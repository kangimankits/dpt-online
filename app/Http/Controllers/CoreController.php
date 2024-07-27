<?php

namespace App\Http\Controllers;

use App\Models\Pemilih;
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
        $this->protectRequest('search:'.$request->ip(), 5);
        $this->protectRequest('search-global', 120);

        return Pemilih::findOrFail($request->key);
    }

    private function protectRequest(string $key, int $limit)
    {
        if (RateLimiter::tooManyAttempts($key, $limit)) {
            abort(400, sprintf('Terlalu banyak permintaan, tunggu %s detik lagi.', RateLimiter::availableIn($key)));
        }

        RateLimiter::increment($key);
    }
}
