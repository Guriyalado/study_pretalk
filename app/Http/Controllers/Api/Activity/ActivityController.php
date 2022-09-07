<?php

namespace App\Http\Controllers\Api\Activity;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Support\Facades\Log;
use App\Repositories\Api\ActivityApiRepository;
use App\Http\Controllers\Api\Activity\Requests\CreateActivityRequest;
use App\Http\Controllers\Api\Activity\Requests\UpdateActivityRequest;
class ActivityController extends Controller
{
    protected $obj;

    function __construct(ActivityApiRepository $data)
    {
        $this->obj=$data;
    }

    public function index()
    {
        try {

            $data = Activity::paginate(2);

            if($data){

            $output = [
            'success' => 200,
            'message' => 'Record Fatched',
            'output'  => $data
        ];

                }else{

                $output = [
            'success' => 200,
            'message' => 'No Data',
            'output'  => $data
        ];
                }


        } catch (\Exception $e) {
            Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());

            $output = [
                'success' => 400,
                'message' => 'Something Went Wrong ' . $e->getMessage(),
                'output' => []
            ];
        }
        return response()->json( $output);

    }


    public function store(CreateActivityRequest $request)
    {
        $output= $this->obj->store();
        return response()->json($output);
    }


    public function update(UpdateActivityRequest $request,$id)
    {
        $output= $this->obj->update($id);
        return response()->json($output);
    }


    public function destroy($id)
    {
         $output= $this->obj->delete($id);
         return response()->json($output);
    }
}