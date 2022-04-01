<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $tasks = Task::orderby('id','desc')->get();
        return view('/dashboard', compact('tasks','user'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$user = auth()->user();

        return view('components/newtask');        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $input['user_id'] = auth()->id();
        $image= $request->image;
        $path = $image->store('public');
        $url = Storage::url($path);
        Task::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$url,
            'user_id'=>$input['user_id'],
            'finish_when'=>$request->finish_when,
            'is_complete'=>0

        ]);
       //$request->only('description');
       return redirect('dashboard');
       //return response()->json($task);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        $task = Task::find($id);
        return view('components/showtaskbyid',compact('task', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('components/edittask', compact('task'));
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

        $data = $request->all();
        if(!$request->get('is_complete')){ 
            $data['is_complete'] = 0; 
        } else {
            $data['is_complete'] = 1; 
        }

        
        $input = $request->only(
            'title',
            'description',
            //'finish_when',
        );        
            $task = Task::find($id);
            $task->update($input);
            $task->update($data);
            return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasks = Task::find($id);
        $tasks->delete();

        return redirect('dashboard');
    }
}
