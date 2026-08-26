<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::orderBy('name')->get();

        return view('admin.faq-categories.index', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('admin.faq-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:faq_categories,name',
        ]);

        FaqCategory::create($validated);

        return redirect()
            ->route('admin.faq-categories.index')
            ->with('success', 'FAQ-categorie toegevoegd.');
    }

    public function edit(FaqCategory $faqCategory)
    {
        return view('admin.faq-categories.edit', [
            'faqCategory' => $faqCategory,
        ]);
    }

    public function update(Request $request, FaqCategory $faqCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:faq_categories,name,' . $faqCategory->id,
        ]);

        $faqCategory->update($validated);

        return redirect()
            ->route('admin.faq-categories.index')
            ->with('success', 'FAQ-categorie aangepast.');
    }

    public function destroy(FaqCategory $faqCategory)
    {
        $faqCategory->delete();

        return redirect()
            ->route('admin.faq-categories.index')
            ->with('success', 'FAQ-categorie verwijderd.');
    }
}
