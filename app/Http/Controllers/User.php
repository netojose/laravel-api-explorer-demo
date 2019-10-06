<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\User as UserRepository;
use App\Http\Requests\HandleUser;

class User extends Controller
{
    private $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function list(Request $request)
    {
        $page = (int) $request->input('page', 1);
        $perPage = (int) $request->input('perPage', 10);
        return $this->user->list($page, $perPage);
    }

    public function create(HandleUser $request)
    {
        $name = $request->input('name');
        $age = $request->input('age');
        return $this->user->add($name, $age);
    }

    public function edit($id, HandleUser $request)
    {
        $data = $request->only('name', 'age');
        return $this->user->edit($id, $data);
    }

    public function show($id)
    {
        $user = $this->user->find((int) $id);
        if (!$user) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        return $user;
    }

    public function delete($id)
    {
        $user = $this->user->find((int) $id);
        if (!$user) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        $this->user->delete($id);
        return response(null, 204);
    }
}
