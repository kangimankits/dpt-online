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
        $this->protectRequest($a = 'search:'.$request->ip(), 5);
        $this->protectRequest($b = 'search-global', 120);

        if($data = Pemilih::find($request->key)){
            RateLimiter::clear($a);
            RateLimiter::clear($b);

            return $data;
        }

        throw new ModelNotFoundException();
    }

    private function protectRequest(string $key, int $limit)
    {
        if (RateLimiter::tooManyAttempts($key, $limit)) {
            abort(400, sprintf('Terlalu banyak kesalahan, tunggu %s detik lagi.', RateLimiter::availableIn($key)));
        }

        RateLimiter::increment($key);
    }
}
