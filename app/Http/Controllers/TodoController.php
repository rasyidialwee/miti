<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("todos/index", [
            'todos' => Todo::orderByDesc('created_at')
                ->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');

        $name = $image->getClientOriginalName();

        $path = $image->storeAs(
            'images',$request->name. '_'. $name, 'public'
        );

        Todo::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_path' => $path
        ]);

        // Todo::create($request->all());

        // $todo = new Todo();
        // $todo->name = $request->name;
        // $todo->description = $request->description;
        // $todo->save();

        return to_route('todos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        return view('todos/edit', [
            'todo' => $todo
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {

        $todo->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return to_route('todos.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return to_route('todos.index');
    }
}
