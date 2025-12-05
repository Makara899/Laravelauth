<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        // 1. Validate ទិន្នន័យ
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // កំណត់ឱ្យបញ្ចូលបានតែរូបភាព
            'description' => 'nullable|string',
        ]);

        // 2. យកទិន្នន័យទាំងអស់
        $data = $request->only(['name', 'slug', 'description']);

        // 3. ពិនិត្យមើលថាតើមានការ Upload រូបភាពទេ?
        if ($request->hasFile('image')) {
            // Save រូបភាពទៅក្នុង folder 'categories' ក្នុង storage/app/public
            $imagePath = $request->file('image')->store('categories', 'public');
            $data['image'] = $imagePath;
        }

        // 4. បង្កើត Category
        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        // 1. Validate ទិន្នន័យ (Update ត្រូវ ignore id បច្ចុប្បន្នសម្រាប់ slug unique)
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        $data = $request->only(['name', 'slug', 'description']);

        // 2. ពិនិត្យមើលការផ្លាស់ប្តូររូបភាព
        if ($request->hasFile('image')) {
            // លុបរូបភាពចាស់ចោលសិន (ប្រសិនបើមាន) ដើម្បីកុំឱ្យពេញ Storage
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }

            // Upload រូបភាពថ្មី
            $imagePath = $request->file('image')->store('categories', 'public');
            $data['image'] = $imagePath;
        }

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        // លុបរូបភាពចេញពី Storage មុននឹងលុបចេញពី Database
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
