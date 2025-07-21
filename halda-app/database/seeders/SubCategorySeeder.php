<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories = [
            'Electronics' => ['Mobiles', 'Laptops', 'Cameras'],
            'Books' => ['Fiction', 'Non-fiction', 'Comics'],
            'Clothing' => ['Men', 'Women', 'Kids'],
            'Home & Kitchen' => ['Furniture', 'Cookware', 'Decor'],
        ];

        foreach ($subcategories as $categoryName => $subs) {
            $category = Category::where('name', $categoryName)->first();

            if ($category) {
                foreach ($subs as $subName) {
                    SubCategory::create([
                        'category_id' => $category->id,
                        'name' => $subName,
                        'status' => true,
                    ]);
                }
            }
        }
    }
}
