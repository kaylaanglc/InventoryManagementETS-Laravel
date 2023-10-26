<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Items;
use App\Http\Requests\Items\StoreRequest;
use App\Http\Requests\Items\UpdateRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('items.index', [
            'items' => Items::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('items.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $filePath = Storage::disk('public')->put('images/items', request()->file('image'));
            $validated['image'] = $filePath;
        }

        $create = Items::create($validated);

        if ($create) {
            session()->flash('notif.success', 'Item created successfully!');
            return redirect()->route('items.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): Response
    {
        $items = Items::findOrFail($id);

        return response()->view('items.show', [
            'items' => $items,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): Response
    {
        $items = Items::findOrFail($id);

        return response()->view('items.form', [
            'items' => $items,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id): RedirectResponse
    {
        $items = Items::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($items->image);

            $filePath = Storage::disk('public')->put('images/items', request()->file('image'));
            $validated['image'] = $filePath;
        }

        $update = $items->update($validated);

        if ($update) {
            session()->flash('notif.success', 'Item updated successfully!');
            return redirect()->route('items.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $items = Items::findOrFail($id);

        Storage::disk('public')->delete($items->image);

        $delete = $items->delete($id);

        if ($delete) {
            session()->flash('notif.success', 'Item deleted successfully!');
            return redirect()->route('items.index');
        }

        return abort(500);
    }
}
