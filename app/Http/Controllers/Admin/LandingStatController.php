<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingStat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingStatController extends Controller
{
    public function index()
    {
        $stats = LandingStat::query()
            ->orderBy('display_order')
            ->orderByDesc('log_date')
            ->paginate(15);

        return view('admin.landing.stats.index', compact('stats'));
    }

    public function create()
    {
        return view('admin.landing.stats.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'log_date' => ['nullable', 'date'],
            'image_url' => ['nullable', 'url', 'max:255'],
            'image_file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['is_active'] = (bool) ($validated['is_active'] ?? false);
        $validated['display_order'] = $validated['display_order'] ?? 0;

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('landing-stats', 'public');
            $validated['image_url'] = Storage::url($path);
        }

        LandingStat::create($validated);

        return redirect()->route('admin.landing.stats.index')
            ->with('success', 'Statistik berhasil ditambahkan.');
    }

    public function edit(LandingStat $stat)
    {
        return view('admin.landing.stats.edit', compact('stat'));
    }

    public function update(Request $request, LandingStat $stat)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'log_date' => ['nullable', 'date'],
            'image_url' => ['nullable', 'url', 'max:255'],
            'image_file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['is_active'] = (bool) ($validated['is_active'] ?? false);
        $validated['display_order'] = $validated['display_order'] ?? 0;

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('landing-stats', 'public');
            $validated['image_url'] = Storage::url($path);
        }

        $stat->update($validated);

        return redirect()->route('admin.landing.stats.index')
            ->with('success', 'Statistik berhasil diperbarui.');
    }

    public function destroy(LandingStat $stat)
    {
        $stat->delete();

        return redirect()->route('admin.landing.stats.index')
            ->with('success', 'Statistik berhasil dihapus.');
    }
}
