$productname->name = $request->name;
        $productname->slug = Str::of($request->name)->slug('-');
        $productname->category_id =  $request->category_id;
        $productname->subcategory_id = $request->subcategory_id;
        $productname->save();