<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Http\Resources\TeamAssignment\ProductCollection;
use App\Http\Resources\TeamAssignment\UserCollection;

class TeamAssignmentController extends Controller
{
    public function products(Request $request)
    {
        $limit = $request->input('limit', 10);
        return new ProductCollection(Product::paginate($limit));
    }

    public function users(Request $request)
    {
        $limit = $request->input('limit', 10);
        return new UserCollection(User::whereNot('email', 'admin@binuswebcourse.vercel.app')->paginate($limit));
    }

    public function addProduct(Request $request)
    {
        // Not implemented
        return response()->json(['message' => 'success']);
    }

    public function patchProduct(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'buy_price' => ['nullable', 'numeric', 'min:1'],
            'sell_price' => ['nullable', 'numeric', 'min:1'],
            'image' => ['nullable', 'image'],
        ]);


        $product = Product::whereId($id)->first();
        if (array_key_exists('image', $validated)) {
            $imageFileName = $validatedData['image']->hashName();

            Storage::disk('tmp')->put(
                $imageFileName,
                $validatedData['image'],
                'public',
            );

            $product->image_url = url("/assets/images/$imageFileName");
        }

        $product->fill($validated);
        $product->save();

        return response()->json(['message' => 'success']);
    }

    public function addUser(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => ['nullable', 'string'],
            'password' => ['nullable', 'string'],
            'gender' => ['nullable', 'in:male,female,other'],
            'placeOfBirth' => ['nullable', 'string', 'min:3'],
            'dateOfBirth' => ['nullable', 'date'],
        ]);


        $user = User::whereId($id)->first();
        $user->fill($validated);
        $user->save();

        return response()->json(['message' => 'success']);
    }

    public function patchUser(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => ['nullable', 'string'],
            'password' => ['nullable', 'string'],
            'gender' => ['nullable', 'in:male,female,other'],
            'placeOfBirth' => ['nullable', 'string', 'min:3'],
            'dateOfBirth' => ['nullable', 'date'],
        ]);


        $user = User::whereId($id)->first();
        $user->fill($validated);
        $user->save();

        return response()->json(['message' => 'success']);
    }

    public function deleteProduct(Request $request, string $id)
    {
        Product::whereId($id)->first()->delete();

        return response('', 204);
    }

    public function deleteUser(Request $request, string $id)
    {
        User::whereId($id)->first()->delete();

        return response('', 204);
    }
}
