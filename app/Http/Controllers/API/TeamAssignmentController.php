<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Resources\TeamAssignment\ProductCollection;
use App\Http\Resources\TeamAssignment\UserCollection;
use Illuminate\Support\Facades\Auth;

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
        return new UserCollection(User::whereNotIn('email', ['admin@binuswebcourse.vercel.app', 'user@binuswebcourse.vercel.app'])->paginate($limit));
    }

    public function addProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'description' => ['required', 'string', 'min:3'],
            'buy_price' => ['required', 'numeric', 'min:1'],
            'sell_price' => ['required', 'numeric', 'min:1'],
            'image' => ['required', 'image'],
        ]);

        if (array_key_exists('image', $validated)) {
            $imageFileName = $validated['image']->hashName();

            Storage::disk('tmp')->put(
                $imageFileName,
                File::get($validated['image']),
                'public',
            );

            $validated['image_url'] = url("/assets/images/$imageFileName");
            unset($validated['image']);
        }

        Product::create($validated);

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
            $imageFileName = $validated['image']->hashName();

            Storage::disk('tmp')->put(
                $imageFileName,
                File::get($validated['image']),
                'public',
            );

            $product->image_url = url("/assets/images/$imageFileName");
        }

        $product->fill($validated);
        $product->save();

        return response()->json(['message' => 'success']);
    }

    public function addUser(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'string', 'min:3'],
            'gender' => ['required', 'in:male,female,other'],
            'placeOfBirth' => ['required', 'string', 'min:3'],
            'dateOfBirth' => ['required', 'date'],
            'role' => ['required', 'in:admin,viewer'],
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

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
            'role' => ['required', 'in:admin,viewer'],
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
        User::whereNotIn('email', ['admin@binuswebcourse.vercel.app', 'user@binuswebcourse.vercel.app'])->whereId($id)->first()->delete();

        return response('', 204);
    }
}
