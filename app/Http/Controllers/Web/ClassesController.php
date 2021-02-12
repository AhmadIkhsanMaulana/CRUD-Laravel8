<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Features\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        $classService = new Classes;

        $filter = [
            'page' => $this->request->page ?? 1,
        ];

        $classes = $classService->index($filter) ?? [];

        return view('class.index')->with(['classes' => $classes]);
    }

    public function create()
    {
        return view('class.create');
    }

    public function store()
    {
        $data = [
            'name' => $this->request->name,
            'teacher_id' => $this->request->teacher,
        ];

        $classService = new Classes;
        $class = $classService->store($data);

        if (!$class) {
            return redirect('classes/create')->with(['errorMessage' => 'Something went wrong']);
        }

        return redirect('classes')->with(['successMessage' => "Created class ". $class['data']['name']]);
    }

    public function show($classesId)
    {
        $classService = new Classes;

        $class = $classService->show($classesId)['data'] ?? [];

        return view('class.show')->with(['class' => $class]);
    }

    public function edit($classesId)
    {
        $classService = new Classes;

        $class = $classService->show($classesId)['data'] ?? [];

        return view('class.edit')->with(['class' => $class, 'classesId' => $classesId]);
    }

    public function storeUpdate($classesId)
    {
        $data = [
            'name' => $this->request->name,
            'teacher_id' => $this->request->teacher,
        ];

        $classService = new Classes;
        $class = $classService->storeUpdate($classesId, $data);

        if (!$class) {
            return redirect("classes/$classesId/edit")->with(['errorMessage' => 'Something went wrong']);
        }

        return redirect("classes/$classesId/edit")->with(['successMessage' => "Update success"]);
    }

}
