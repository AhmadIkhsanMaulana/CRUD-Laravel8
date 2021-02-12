<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class ClassController extends Controller
{
    public function index()
    {

        $classes = Classes::paginate($this->perPage());

        return $this->respondWithResource($classes);
    }

    public function create()
    {
        $class  = new Classes;
        $class->id = Uuid::uuid4()->toString();
        $class = $this->fill($class, $this->request->only(['name', 'teacher_id']));

        $class->save();

        return $this->respondWithResource($class);
    }

    public function fill(Classes $class, $attributes)
    {
        foreach ($attributes as $key => $value) {
            $class->$key = $value;
        }

        Validator::make($class->toArray(), [
            'name' => 'required|string',
            'teacher_id' => 'required|uuid',
        ])->validate();

        return $class;
    }
}
