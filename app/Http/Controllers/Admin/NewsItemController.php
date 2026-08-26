<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsItemController extends Controller
{
    public function index()
    {
        $newsItems = NewsItem::orderByDesc('published_at')->get();

        return view('admin.news.index', [
            'newsItems' => $newsItems,
        ]);
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published_at' => 'required|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request
                ->file('image')
                ->store('news-images', 'public');
        }

        NewsItem::create($validated);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Nieuwsitem succesvol aangemaakt.');
    }

    public function edit(NewsItem $news)
    {
        return view('admin.news.edit', [
            'newsItem' => $news,
        ]);
    }

    public function update(Request $request, NewsItem $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published_at' => 'required|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }

            $validated['image'] = $request
                ->file('image')
                ->store('news-images', 'public');
        }

        $news->update($validated);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Nieuwsitem succesvol aangepast.');
    }

    public function destroy(NewsItem $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Nieuwsitem succesvol verwijderd.');
    }
}
