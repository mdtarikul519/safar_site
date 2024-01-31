<?php

namespace App\Http\Controllers\safor;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\SecretariateActiveStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
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

        $query = Schedule::where('status', $status)->orderBy($orderBy, $orderByType);

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
        $data = Schedule::where('id', $id)
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
            'shakha_id' => ['required'],
            'sakha' => ['required'],
            'present_time' => ['required'],
            'leave_time' => ['required'],
            'time_of_present_in_own_address' => ['required'],
            'program_start_time' => ['required'],
            'program_end_time' => ['required'],
            'how_many_programs' => ['required'],
            'program_ids' => ['required'],
            'program_type' => ['required'],
            'deligate_amount' => ['required'],
            'deligate_type' => ['required'],
            'topics' => ['required'],
            'secretariate_id' => ['required'],
            'schedule_status' => ['required'],
            'secretariate_comment' => ['required'],

        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new Schedule();
        $data->shakha_id = request()->shakha_id;
        $data->sakha = request()->sakha;
        $data->present_time = request()->present_time;
        $data->leave_time = request()->leave_time;
        $data->time_of_present_in_own_address = request()->time_of_present_in_own_address;
        $data->program_start_time = request()->program_start_time;
        $data->program_end_time = request()->program_end_time;
        $data->how_many_programs = request()->how_many_programs;
        $data->program_ids = request()->program_ids;
        $data->program_type = request()->program_type;
        $data->deligate_amount = request()->deligate_amount;
        $data->deligate_type = request()->deligate_type;
        $data->topics = request()->topics;
        $data->secretariate_id = request()->secretariate_id;
        $data->schedule_status = request()->schedule_status;
        $data->secretariate_comment = request()->secretariate_comment;
        if ($data->save()) {

            $item = new SecretariateActiveStatus();
            $item->schedule_id = $data->id;
            $item->post_date = Carbon::parse($data->present_time)->toDateTimeString();
            $item->active_status = 'busy';
            $item->busy_start = $data->present_time;
            $item->busy_end = $data->time_of_present_in_own_address;
            $item->when_free = $data->time_of_present_in_own_address;
            $item->description = 'angaest in program';

            $item->save();

            if (request()->hasFile('image')) {
                // 
            }

            return response()->json($data, 200);
        }
    }

    public function store_by_admin()
    {
        $data = new Schedule();
        $data->shakha_id = request()->shakha_id;
        $data->sakha = request()->sakha;
        $data->present_time = request()->present_time;
        $data->leave_time = request()->leave_time;
        $data->time_of_present_in_own_address = request()->time_of_present_in_own_address;
        $data->program_start_time = request()->program_start_time;
        $data->program_end_time = request()->program_end_time;
        $data->how_many_programs = request()->how_many_programs;
        $data->program_ids = request()->program_ids;
        $data->program_type = request()->program_type;
        $data->deligate_amount = request()->deligate_amount;
        $data->deligate_type = request()->deligate_type;
        $data->topics = request()->topics;
        $data->secretariate_id = request()->secretariate_id;
        $data->schedule_status = 'accepted_by_admin';
        $data->secretariate_comment = request()->secretariate_comment;
        $data->save();
    }

    public function store_by_branch()
    {
        $data = new Schedule();
        $data->shakha_id = request()->shakha_id;
        $data->sakha = request()->sakha;
        $data->present_time = request()->present_time;
        $data->leave_time = request()->leave_time;
        $data->time_of_present_in_own_address = request()->time_of_present_in_own_address;
        $data->program_start_time = request()->program_start_time;
        $data->program_end_time = request()->program_end_time;
        $data->how_many_programs = request()->how_many_programs;
        $data->program_ids = request()->program_ids;
        $data->program_type = request()->program_type;
        $data->deligate_amount = request()->deligate_amount;
        $data->deligate_type = request()->deligate_type;
        $data->topics = request()->topics;
        $data->secretariate_id = request()->secretariate_id;
        $data->schedule_status = 'pending';
        $data->secretariate_comment = request()->secretariate_comment;
        $data->save();
    }

    public function acceptd_by_admin($id)
    {

        $data = Schedule::find($id);
        $data->schedule_status = 'accepted_by_admin';
        $data->save();
    }

    public function accepted_by_secretariat($id)
    {
        $data = Schedule::find($id);
        $data->schedule_status = 'accepted_by_secretariate';
        $data->save();
    }

    public function rejected_by_secretariat($id)
    {
        $data = Schedule::find($id);
        $data->schedule_status = 'rejected_by_secretariate';
        $data->save();
    }

    public function admin_asign_secretariat($id)
    {
        $data = Schedule::find($id);
        $data->schedule_status = 'rejected_by_secretariate';
        $data->save();
    }
    public function canvas_store()
    {
        $validator = Validator::make(request()->all(), [
            'shakha_id' => ['required'],
            'sakha' => ['required'],
            'present_time' => ['required'],
            'leave_time' => ['required'],
            'time_of_present_in_own_address' => ['required'],
            'program_start_time' => ['required'],
            'program_end_time' => ['required'],
            'how_many_programs' => ['required'],
            'program_ids' => ['required'],
            'program_type' => ['required'],
            'deligate_amount' => ['required'],
            'deligate_type' => ['required'],
            'topics' => ['required'],
            'secretariate_id' => ['required'],
            'schedule_status' => ['required'],
            'secretariate_comment' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new Schedule();
        $data->shakha_id = request()->shakha_id;
        $data->sakha = request()->sakha;
        $data->present_time = request()->present_time;
        $data->leave_time = request()->leave_time;
        $data->time_of_present_in_own_address = request()->time_of_present_in_own_address;
        $data->program_start_time = request()->program_start_time;
        $data->program_end_time = request()->program_end_time;
        $data->how_many_programs = request()->how_many_programs;
        $data->program_ids = request()->program_ids;
        $data->program_type = request()->program_type;
        $data->deligate_amount = request()->deligate_amount;
        $data->deligate_type = request()->deligate_type;
        $data->topics = request()->topics;
        $data->secretariate_id = request()->secretariate_id;
        $data->schedule_status = request()->schedule_status;
        $data->secretariate_comment = request()->secretariate_comment;
        $data->save();

        if (request()->hasFile('image')) {
            // 
        }

        return response()->json($data, 200);
    }

    public function update()
    {
        $data = Schedule::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'shakha_id' => ['required'],
            'sakha' => ['required'],
            'present_time' => ['required'],
            'leave_time' => ['required'],
            'time_of_present_in_own_address' => ['required'],
            'program_start_time' => ['required'],
            'program_end_time' => ['required'],
            'how_many_programs' => ['required'],
            'program_ids' => ['required'],
            'program_type' => ['required'],
            'deligate_amount' => ['required'],
            'deligate_type' => ['required'],
            'topics' => ['required'],
            'secretariate_id' => ['required'],
            'schedule_status' => ['required'],
            'secretariate_comment' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $data->shakha_id = request()->shakha_id;
        $data->sakha = request()->sakha;
        $data->present_time = request()->present_time;
        $data->leave_time = request()->leave_time;
        $data->time_of_present_in_own_address = request()->time_of_present_in_own_address;
        $data->program_start_time = request()->program_start_time;
        $data->program_end_time = request()->program_end_time;
        $data->how_many_programs = request()->how_many_programs;
        $data->program_ids = request()->program_ids;
        $data->program_type = request()->program_type;
        $data->deligate_amount = request()->deligate_amount;
        $data->deligate_type = request()->deligate_type;
        $data->topics = request()->topics;
        $data->secretariate_id = request()->secretariate_id;
        $data->schedule_status = request()->schedule_status;
        $data->secretariate_comment = request()->secretariate_comment;
        $data->save();

        if (request()->hasFile('image')) {
            // 
        }

        return response()->json($data, 200);
    }

    public function canvas_update()
    {
        $data = Schedule::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'shakha_id' => ['required'],
            'sakha' => ['required'],
            'present_time' => ['required'],
            'leave_time' => ['required'],
            'time_of_present_in_own_address' => ['required'],
            'program_start_time' => ['required'],
            'program_end_time' => ['required'],
            'how_many_programs' => ['required'],
            'program_ids' => ['required'],
            'program_type' => ['required'],
            'deligate_amount' => ['required'],
            'deligate_type' => ['required'],
            'topics' => ['required'],
            'secretariate_id' => ['required'],
            'schedule_status' => ['required'],
            'secretariate_comment' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->shakha_id = request()->shakha_id;
        $data->sakha = request()->sakha;
        $data->present_time = request()->present_time;
        $data->leave_time = request()->leave_time;
        $data->time_of_present_in_own_address = request()->time_of_present_in_own_address;
        $data->program_start_time = request()->program_start_time;
        $data->program_end_time = request()->program_end_time;
        $data->how_many_programs = request()->how_many_programs;
        $data->program_ids = request()->program_ids;
        $data->program_type = request()->program_type;
        $data->deligate_amount = request()->deligate_amount;
        $data->deligate_type = request()->deligate_type;
        $data->topics = request()->topics;
        $data->secretariate_id = request()->secretariate_id;
        $data->schedule_status = request()->schedule_status;
        $data->secretariate_comment = request()->secretariate_comment;
        $data->save();

        if (request()->hasFile('image')) {
            // 
        }

        return response()->json($data, 200);
    }

    public function soft_delete()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:schedules,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Schedule::find(request()->id);
        $data->status = '0';
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:schedules,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Schedule::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:schedules,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Schedule::find(request()->id);
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
            $check = Schedule::where('id', $item->id)->first();
            if (!$check) {
                try {
                    Schedule::create((array) $item);
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
