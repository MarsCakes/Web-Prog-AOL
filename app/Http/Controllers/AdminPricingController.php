<?php

namespace App\Http\Controllers;

use App\Models\PricingCategory;
use Illuminate\Http\Request;

class AdminPricingController extends Controller
{
  public function index()
  {
    $categories = PricingCategory::orderBy('name')->get();
    return view('dashboard.admin_pricing', compact('categories'));
  }

  public function edit(PricingCategory $category)
  {
    return view('dashboard.admin_pricing_edit', compact('category'));
  }

  public function update(Request $request, PricingCategory $category)
  {
    $validated = $request->validate([
      'name' => ['required', 'string', 'max:100'],
      'unit' => ['required', 'string', 'max:50'],
      'price' => ['required', 'integer', 'min:0'],
      'description' => ['nullable', 'string'],
    ]);
    $category->update($validated);
    return redirect()->route('admin.pricing')->with('success', 'Kategori diperbarui.');
  }

  public function create()
  {
    return view('dashboard.admin_pricing_create');
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'name' => ['required', 'string', 'max:100'],
      'unit' => ['required', 'string', 'max:50'],
      'price' => ['required', 'integer', 'min:0'],
      'description' => ['nullable', 'string'],
    ]);
    PricingCategory::create($validated);
    return redirect()->route('admin.pricing')->with('success', 'Kategori berhasil dibuat.');
  }

  public function destroy(PricingCategory $category)
  {
    $category->delete();
    return back()->with('success', 'Kategori dihapus.');
  }
}
