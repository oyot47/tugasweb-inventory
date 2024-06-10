<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::all();
        return view('images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'path' => 'required|string|max:255', // Sesuaikan dengan kebutuhan Anda
        ]);

        try {
            $newFilename = Str::after($request->input('path'), 'tmp/');
            Storage::disk('public')->move($request->input('path'), "images/$newFilename");
            Image::create(['path' => "images/$newFilename"]);
            return redirect()->route('images.create')->withSuccess('File uploaded successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->withError('An error occurred: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        return view('images.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        return view('images.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        $request->validate([
            'path' => 'nullable|string|max:255', // Sesuaikan dengan kebutuhan Anda
        ]);

        try {
            if (!empty($request->input('path'))) {
                if (Str::afterLast($request->input('path'), '/') !== Str::afterLast($image->path, '/')) {
                    Storage::disk('public')->delete($image->path);
                    $newFilename = Str::after($request->input('path'), 'tmp/');
                    Storage::disk('public')->move($request->input('path'), "images/$newFilename");
                }

                $image->update([
                    'path' => isset($newFilename) ? "images/$newFilename" : $image->path
                ]);
            }

            return redirect()->back()->withSuccess('File update successfully');

        } catch (\Throwable $th) {
            return redirect()->back()->withError('An error occurred: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        if (Storage::exists('public/' . $image->path)) {
            Storage::delete('public/' . $image->path);
        }
        $image->delete();
        return back()->withSuccess('File deleted successfully');
    }
}
