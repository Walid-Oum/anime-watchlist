<?php

namespace App\Http\Controllers;

use App\Models\NewsItem;

class NewsController extends Controller
{
    public function index()
    {
        $newsItems = NewsItem::orderByDesc('published_at')->get();

        return view('news.index', [
            'newsItems' => $newsItems,
        ]);
    }

    public function show(NewsItem $newsItem)
    {
        return view('news.show', [
            'newsItem' => $newsItem,
        ]);
    }
}
