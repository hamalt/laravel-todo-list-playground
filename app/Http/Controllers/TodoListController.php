<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // DBよりtodo_listsテーブルの値をすべて取得
        $todo_lists = TodoList::all();

        // 取得した値をビューに表示
        return view('todolist/index', compact('todo_lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $todo_list = new TodoList();
        return view('todolist/create', compact('todo_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $todo_list = new TodoList();
        $todo_list->title = $request->title;
        $todo_list->description = $request->description;

        if (NULL === $request->complete) {
            $todo_list->complete = 0;
        } else {
            $todo_list->complete = 1;
        }

        $todo_list->save();

        return redirect()->route('todolist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // DBよりURIパラメータと同じIDを持つTodo Listの情報を取得
        $todo_list = TodoList::findOrFail($id);

        return view('todolist/edit', compact('todo_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // DBよりURIパラメータと同じIDを持つTodo Listの情報を取得
        $todo_list = TodoList::findOrFail($id);
        $complete = $todo_list->complete;

        $todo_list->title = $request->title;
        $todo_list->description = $request->description;

        if (NULL === $request->complete) {
            $todo_list->complete = 0;
        } else {
            $todo_list->complete = 1;
        }

        $todo_list->save();

        return redirect()->route('todolist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $todo_list = TodoList::findOrFail($id);
        $todo_list->delete();

        return redirect()->route('todolist.index');
    }
}
