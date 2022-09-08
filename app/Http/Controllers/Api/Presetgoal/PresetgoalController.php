<?php

namespace App\Http\Controllers\Api\Presetgoal;
use App\Http\Controllers\Controller;
use App\Models\Presetgoal;
use Illuminate\Support\Facades\Log;
use App\Repositories\Api\PresetgoalApiRepository;
use App\Http\Controllers\Api\Presetgoal\Requests\CreatePresetgoalRequest;
use App\Http\Controllers\Api\Presetgoal\Requests\UpdatePresetgoalRequest;
class PresetgoalController extends Controller
{
    protected $obj;

    function __construct(PresetgoalApiRepository $data)
    {
        $this->obj=$data;
    }

    public function index()
    {
        try {

            $data = Presetgoal::paginate(2);

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


    public function store(CreatePresetgoalRequest $request)
    {
        $output= $this->obj->store();
        return response()->json($output);
    }


    public function update(UpdatePresetgoalRequest $request,$id)
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