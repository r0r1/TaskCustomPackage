<?php

namespace Rori\Task\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Exception;
use Rori\Task\Models\Tasks;

class TasksController extends Controller{
    
    protected $task;

    public function __construct(Tasks $task)
    {
        $this->task = $task;
    }

    public function index()
    {
        try{
            return response()->json([
                'result' => $this->task->all(),
                'success' => true
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'slug'  => 'required',
            'name'  => 'required',
            'description' => '',
            'attachment' => 'max:50000|mimes:pdf,docx',
            'user_id'   => 'required'
        ]);

        try{
            $this->task->create($request->all());

            return response()->json([
                'result' => $this->task,
                'success' => true
            ], 201);
        }catch(Exception $e){
            return response()->json([
                'messages' => $e->getMessage(),
                'success' => false
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'slug'  => 'required',
            'name'  => 'required',
            'description' => '',
            'attachment' => 'max:50000|mimes:pdf,docx',
            'user_id'   => 'required'
        ]);

        try{
            $this->task->find($id);
            $this->task->fill($request->all());
            $this->task->save();

            return response()->json([
                'result' => $this->task,
                'success' => true
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'messages' => $e->getMessage(),
                'success' => false
            ], 400);
        }
    }

    public function destroy($id)
    {
        try{
            $this->task->find($id)->delete();

            return response()->json([
                'result' => $this->task,
                'success' => true
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'messages' => $e->getMessage(),
                'success' => false
            ], 400);
        }
    }
}