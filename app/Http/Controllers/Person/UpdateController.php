<?php

namespace App\Http\Controllers\Person;

use App\Http\Requests\Person\UpdateRequest;
use App\Models\Person;

class UpdateController
{
    public function __invoke(UpdateRequest $request, Person $person){
        $data = $request->validated();
        $person->update($data);
        return response([]);

    }
}
