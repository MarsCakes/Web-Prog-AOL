<?php

namespace App\Http\Controllers;

use App\Models\PricingCategory;
use Illuminate\Http\Request;

class AdminPricingController extends Controller
{
    public function index()
    {
        return view('dashboard.admin_pricing', [
            'categories' => $this->getCategories(),
        ]);
    }

    public function create()
    {
        return view('dashboard.admin_pricing_create');
    }

    public function edit(PricingCategory $category)
    {
        return view('dashboard.admin_pricing_edit', [
            'category' => $category,
        ]);
    }

    public function store(Request $request)
    {
        PricingCategory::create(
            $this->validateData($request)
        );

        return redirect()
            ->route('admin.pricing')
            ->with('success', 'Kategori berhasil dibuat.');
    }

    public function update(Request $request, PricingCategory $category)
    {
        $category->update(
            $this->validateData($request)
        );

        return redirect()
            ->route('admin.pricing')
            ->with('success', 'Kategori diperbarui.');
    }

    public function destroy(PricingCategory $category)
    {
        $category->delete();

        return back()->with('success', 'Kategori dihapus.');
    }

    private function getCategories()
    {
        return PricingCategory::orderBy('name')->get();
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'unit' => ['required', 'string', 'max:50'],
            'price' => ['required', 'integer', 'min:0'],
            'description' => ['nullable', 'string'],
        ]);
    }
}
