public function handle($request, Closure $next, ...$guards)
{
    $this->authenticate($request, $guards);

    return $next($request);
}