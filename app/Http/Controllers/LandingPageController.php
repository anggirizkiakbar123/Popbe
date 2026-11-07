<?php

namespace App\Http\Controllers;

use App\Models\LandingSchedule;
use App\Models\LandingStat;
use App\Models\Sport;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        if (auth('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        if (auth('peserta')->check()) {
            return redirect()->route('peserta.dashboard');
        }

        $sportId = $request->query('sport_id');

        $sports = Sport::orderBy('name')->get();

        $scheduleQuery = LandingSchedule::with('sport')
            ->orderBy('match_date');

        if ($sportId) {
            $scheduleQuery->where('sport_id', $sportId);
        }

        $schedules = $scheduleQuery->limit(12)->get();

        $firstSchedule = LandingSchedule::when($sportId, function ($query) use ($sportId) {
            $query->where('sport_id', $sportId);
        })->orderBy('match_date')->first();

        $lastSchedule = LandingSchedule::when($sportId, function ($query) use ($sportId) {
            $query->where('sport_id', $sportId);
        })->orderByDesc('match_date')->first();

        $liveMatches = LandingSchedule::with('sport')
            ->where('status', 'live')
            ->when($sportId, function ($query) use ($sportId) {
                $query->where('sport_id', $sportId);
            })
            ->orderBy('match_date')
            ->limit(3)
            ->get();

        $landingStats = LandingStat::query()
            ->where('is_active', true)
            ->orderBy('display_order')
            ->orderByDesc('log_date')
            ->get();

        $selectedSport = $sportId ? $sports->firstWhere('id', (int) $sportId) : null;

        return view('welcome', compact(
            'sports',
            'schedules',
            'liveMatches',
            'sportId',
            'selectedSport',
            'firstSchedule',
            'lastSchedule',
            'landingStats'
        ));
    }
}
