<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $data["title"] = __("Dashboard");
        $userStat =  User::query()
            ->selectRaw('count(*) as totalUsers')
            ->selectRaw("count(case when assigned_role = 'user' then 1 end) as userCount")
            ->selectRaw("count(case when is_active = true then 1 end) as activeUserCount")
            ->first();

        $data['userCount'] = $userStat?->userCount;
        $data['percentUser'] =  $userStat?->totalUsers === 0 ? 0 : ($userStat?->userCount  / $userStat?->totalUsers) * 100;
        $data['activeUserCount'] = $userStat?->activeUserCount;
        $data['percentActiveUser'] = $userStat?->totalUsers === 0 ? 0 : ($userStat?->activeUserCount / $userStat?->totalUsers) * 100;

        $announcementStat = Announcement::query()
            ->selectRaw('count(*) as totalAnnoucements')
            ->selectRaw("count(published_at) as announcmentCount")
            ->first();

        $data['announcmentCount'] = $announcementStat?->announcmentCount;
        $data['percentAnnouncment'] = $announcementStat?->totalAnnoucements === 0 ? 0 : ($announcementStat?->announcmentCount  / $announcementStat?->totalAnnoucements) * 100;
        return view("dashboard", $data);
    }
}
