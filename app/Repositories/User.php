<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;

class User
{
    private $items;

    public function __construct()
    {
        $this->items = collect([
            ['id' => 1, 'name' => 'José', 'age' => 32],
            ['id' => 2, 'name' => 'Paul', 'age' => 13],
            ['id' => 3, 'name' => 'Mark', 'age' => 45],
            ['id' => 4, 'name' => 'Mary', 'age' => 24],
            ['id' => 5, 'name' => 'Nicole', 'age' => 12],
            ['id' => 6, 'name' => 'Andrew', 'age' => 21],
            ['id' => 7, 'name' => 'Jack', 'age' => 42],
            ['id' => 8, 'name' => 'Anna', 'age' => 17],
            ['id' => 9, 'name' => 'Patrice', 'age' => 34],
            ['id' => 10, 'name' => 'Dolly', 'age' => 65],
            ['id' => 11, 'name' => 'Luke', 'age' => 19],
            ['id' => 12, 'name' => 'Rick', 'age' => 26],
            ['id' => 13, 'name' => 'Anderson', 'age' => 43],
            ['id' => 14, 'name' => 'Peter', 'age' => 19],
            ['id' => 15, 'name' => 'Jhon', 'age' => 39],
            ['id' => 16, 'name' => 'Antony', 'age' => 22],
            ['id' => 17, 'name' => 'Wilson', 'age' => 21],
            ['id' => 18, 'name' => 'Julius', 'age' => 12],
            ['id' => 19, 'name' => 'Sandra', 'age' => 34],
            ['id' => 20, 'name' => 'Natali', 'age' => 47],
            ['id' => 21, 'name' => 'Natasha', 'age' => 22],
            ['id' => 22, 'name' => 'Valkiria', 'age' => 52],
            ['id' => 23, 'name' => 'Julienne', 'age' => 27],
            ['id' => 24, 'name' => 'Pamela', 'age' => 51],
            ['id' => 25, 'name' => 'Donald', 'age' => 43],
            ['id' => 26, 'name' => 'Wick', 'age' => 38],
            ['id' => 27, 'name' => 'Julia', 'age' => 48],
            ['id' => 28, 'name' => 'Andrea', 'age' => 27],
            ['id' => 29, 'name' => 'Rui', 'age' => 46],
            ['id' => 30, 'name' => 'Nilson', 'age' => 14]
        ]);
    }

    public function list($page = 1, $perPage = 10)
    {
        $items   = $this->getItems();
        $total   = $items->count();
        $chunk   = $items->forPage($page, $perPage);
        $results = new LengthAwarePaginator($chunk, $total, $perPage);
        return [
            'data' => $results->items(),
            'meta' => [
                'current_page' => $results->currentPage(),
                'per_page' => $results->perPage(),
                'last_page' => $results->lastPage(),
                'url' => $results->url($page),
                'prev_url' => $results->previousPageUrl(),
                'next_url' => $results->nextPageUrl(),
                'total' => $results->total()
            ]
        ];
    }

    public function find($id)
    {
        return $this->getItems()->first(function ($user) use ($id) {
            return $user['id'] === (int) $id;
        });
    }

    public function add($name, $age)
    {
        $last = $this->getItems()->last();
        $newId = $last ? $last['id'] + 1 : 1;
        $user = ['id' => $newId, 'name' => $name, 'age' => $age];
        // Add $user here
        return $user;
    }

    public function delete($id)
    {
        $user = $this->find($id);
        // Remove $user here
    }

    public function edit($id, $data)
    {
        $user = $this->find($id);
        return array_merge($user, $data);
    }

    private function getItems()
    {
        return $this->items;
    }
}
