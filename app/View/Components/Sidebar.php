<?php

namespace App\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

class Sidebar extends Component
{
    const OPTIONS = [
        "title" => "",
        "route_name" => "",
        "url" => "",
        "is_external_url" => false,
        "link_target" => "_self",
        "active" => false,
        "icon" => "",
        "children" => [],
    ];

    public array $list;

    public function __construct()
    {
        $this->list = $this->makeList(config('navigation'));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar.index');
    }

    private function makeList(array $list)
    {
        foreach ($list as $key => $nav) {
            if ($this->hasNotPermission($nav)) {
                unset($list[$key]);
                continue;
            }

            $list[$key] = $this->setArray($nav);
            if (isset($nav['children']) && !empty($nav['children'])) {
                $newList = $this->makeList($nav['children']);
                if (!empty($newList)) {
                    $list[$key]['children'] = $newList;
                    if (array_sum(array_column($newList, 'active')) > 0) {
                        $list[$key]['active'] = true;
                    }
                } else {
                    unset($list[$key]);
                }
            }
        }
        return $list;
    }

    private function setArray($nav): array
    {
        if(isset($nav['route_name']) && strlen($nav['route_name']) > 0){
            $nav['active'] = Route::currentRouteName() === $nav['route_name'];
            $nav['url'] = route($nav['route_name']);
        }elseif (isset($nav['url']) && !isset($nav['is_external_url']) && strlen($nav['url']) > 0) {
            $nav['active'] = Request::is($nav['url']);
            $nav['url'] = url($nav['url']);
        }elseif (isset($nav['is_external_url']) && $nav['is_external_url'] && isset($nav['url'])) {
            $nav['link_target'] = '_blank';
        }


        if (isset($nav['url']) && !isset($nav['is_external_url'])) {
            $route = collect(Route::getRoutes())->first(function($route) use($nav){
                return $route->matches(request()->create($nav['url']));
            });

            $nav['active'] = Str::contains(Route::current()->uri(), $route->uri());
        }

        return array_replace(self::OPTIONS, $nav);
    }


    private function hasNotPermission($nav) : bool
    {
        if (isset($nav['route_name']) && !has_permission($nav['route_name'])) {
                return true;
        }elseif (isset($nav['url'])) {
            $route = collect(Route::getRoutes())->first(function($route) use($nav){
                return $route->matches(request()->create($nav['url']));
            });

            $routeName = $route?->getName();
            if(strlen($routeName) > 0 && !has_permission($routeName)){
                return true;
            }
        }

        return false;
    }
}
