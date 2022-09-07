<?php

namespace App\Http\Controllers\Api\Subject;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Support\Facades\Log;
use App\Repositories\Api\SubjectApiRepository;
use App\Http\Controllers\Api\Subject\Requests\CreateSubjectRequest;
use App\Http\Controllers\Api\Subject\Requests\UpdateSubjectRequest;
class SubjectController extends Controller
{
    protected $obj;

    function __construct(SubjectApiRepository $data)
    {
        $this->obj=$data;
    }

    public function index()
    {
        try {

            $data = Subject::paginate(2);

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


    public function store(CreateSubjectRequest $request)
    {
        $output= $this->obj->store();
        return response()->json($output);
    }


    public function update(UpdateSubjectRequest $request,$id)
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