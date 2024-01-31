<?php

namespace App\Http\Controllers\safor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function all()
    {
        $paginate = (int) request()->paginate ?? 10;
        $orderBy = request()->orderBy ?? 'id';
        $orderByType = request()->orderByType ?? 'ASC';

        $status = 'active';
        if (request()->has('status')) {
            $status = request()->status;
        }

        $query = User::where('status', $status)->orderBy($orderBy, $orderByType);

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', '%' . $key . '%')
                    ->orWhere('title', '%' . $key . '%')
                    ->orWhere('status', '%' . $key . '%');
            });
        }

        $datas = $query->paginate($paginate);
        return response()->json($datas);
    }

    public function show($id)
    {

        $select = ["*"];
        if (request()->has('select_all') && request()->select_all) {
            $select = "*";
        }
        $data = User::where('id', $id)
            ->select($select)
            ->first();
        if ($data) {
            return response()->json($data, 200);
        } else {
            return response()->json([
                'err_message' => 'data not found',
                'errors' => [
                    'user' => [],
                ],
            ], 404);
        }
    }
    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'full_name' => ['required'],      
            'user_name' => ['required'],      
            'role_name' => ['required'],      
            'telegram_name' => ['required'],      
            'telegram_id' => ['required'],      
            'image' => ['required'],
            'email' => ['required'], 
            'password' => ['required'], 


        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new User();
        $data->full_name = request()->full_name;
        $data->user_name = request()->user_name;
        $data->role_name = request()->role_name;
        $data->telegram_name = request()->telegram_name;
        $data->telegram_id = request()->telegram_id;
        $data->image = request()->image;
        $data->email = request()->email;
        $data->password = request()->password;
        $data->save();

        if (request()->hasFile('image')) {
            // 
        }

        return response()->json($data, 200);
    }

    public function canvas_store()
    {
        $validator = Validator::make(request()->all(), [
            'full_name' => ['required'],      
            'user_name' => ['required'],      
            'role_name' => ['required'],      
            'telegram_name' => ['required'],      
            'telegram_id' => ['required'],      
            'image' => ['required'],
            'email' => ['required'], 
            'password' => ['required'],        
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new User();
        $data->full_name = request()->full_name;
        $data->user_name = request()->user_name;
        $data->role_name = request()->role_name;
        $data->telegram_name = request()->telegram_name;
        $data->telegram_id = request()->telegram_id;
        $data->image = request()->image;
        $data->email = request()->email;
        $data->password = request()->password;
        $data->save();

        if (request()->hasFile('image')) {
            // 
        }

        return response()->json($data, 200);
    }

    public function update()
    {
        $data = User::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'full_name' => ['required'],      
            'user_name' => ['required'],      
            'role_name' => ['required'],      
            'telegram_name' => ['required'],      
            'telegram_id' => ['required'],      
            'image' => ['required'],
            'email' => ['required'], 
            'password' => ['required'],   
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $data->full_name = request()->full_name;
        $data->user_name = request()->user_name;
        $data->role_name = request()->role_name;
        $data->telegram_name = request()->telegram_name;
        $data->telegram_id = request()->telegram_id;
        $data->image = request()->image;
        $data->email = request()->email;
        $data->password = request()->password;
        $data->save();

        if (request()->hasFile('image')) {
            // 
        }

        return response()->json($data, 200);
    }

    public function canvas_update()
    {
        $data = User::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'full_name' => ['required'],      
            'user_name' => ['required'],      
            'role_name' => ['required'],      
            'telegram_name' => ['required'],      
            'telegram_id' => ['required'],      
            'image' => ['required'],
            'email' => ['required'], 
            'password' => ['required'],      
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $data->full_name = request()->full_name;
        $data->user_name = request()->user_name;
        $data->role_name = request()->role_name;
        $data->telegram_name = request()->telegram_name;
        $data->telegram_id = request()->telegram_id;
        $data->image = request()->image;
        $data->email = request()->email;
        $data->password = request()->password;
        $data->save();

        if (request()->hasFile('image')) {
            // 
        }

        return response()->json($data, 200);
    }

    public function soft_delete()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:users,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = User::find(request()->id);
        $data->status ='0';
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [ 
            'id' => ['required', 'exists:users,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = User::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:users,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = User::find(request()->id);
        $data->status = '1';
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }

    public function bulk_import()
    {
        $validator = Validator::make(request()->all(), [
            'data' => ['required', 'array'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        foreach (request()->data as $item) {
            $item['created_at'] = $item['created_at'] ? Carbon::parse($item['created_at']) : Carbon::now()->toDateTimeString();
            $item['updated_at'] = $item['updated_at'] ? Carbon::parse($item['updated_at']) : Carbon::now()->toDateTimeString();
            $item = (object) $item;
            $check = User::where('id', $item->id)->first();
            if (!$check) {
                try {
                    User::create((array) $item);
                } catch (\Throwable $th) {
                    return response()->json([
                        'err_message' => 'validation error',
                        'errors' => $th->getMessage(),
                    ], 400);
                }
            }
        }

        return response()->json('success', 200);
    }
}