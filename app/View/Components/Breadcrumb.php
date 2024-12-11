<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\View\View;

class Breadcrumb extends Component
{
    public function render(): View
    {
        return view('components.breadcrumb');
    }

    public function breadcrumbs(): array
    {
        $routeList = Route::getRoutes()->getRoutesByMethod()['GET'];
        $baseUrl = url('/');
        $segments = Request::segments();
        $routeUries = explode('/', Route::current()->uri());
        $breadcrumbs = [];
        $routeParameters = Request::route()->originalParameters();
        // dd($segments);
        foreach ($segments as $key => $segment) {
            if ($key === 0 && check_language($segment)) {
                continue;
            }


            if ($segment == 'dashboard') {
                continue;
            }

            $displayUrl = true;
            $lastBreadcrumb = end($breadcrumbs);
            if (empty($lastBreadcrumb)) {
                $url = $baseUrl . '/' . $segment;
            } else {
                $url = $lastBreadcrumb['url'] . '/' . $segment;

            }

            $uris = array_slice($routeUries, 0, $key + 1);
            $resultUri = '';
            foreach ($uris as $uriKey => $uri) {
                $resultUri .= '/' . $uri;
            }

            if (!array_key_exists(ltrim($resultUri, '/'), $routeList)) {
                $displayUrl = false;
            }
            $breadcrumbs[] = [
                'name' => in_array($segment, $routeParameters) ? __(ucfirst($segment)) : __(Str::title(preg_replace('/[-_]+/', ' ', $segment))),
                'url' => $url,
                'display_url' => $displayUrl
            ];

        }
        // dd($breadcrumbs);
        return $breadcrumbs;
    }
}
