<?php



use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class CheckAge{
    public function handle(Request $req,Closure $next): Response{
        $age = $req->input('age');

        if($age < 18){
            return redirect('/denied-page');
        }
        else{
            return $next($req);
        }
    }
}