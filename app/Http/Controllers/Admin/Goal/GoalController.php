<?php

namespace App\Http\Controllers\Admin\Goal;

use App\Models\Goal;
use App\Models\Subject;


use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\User\GoalRepository;
use App\Http\Controllers\Admin\Goal\Requests\CreateGoalRequest;
use App\Http\Controllers\Admin\Goal\Requests\UpdateGoalRequest;

class GoalController extends Controller
{
    /**
     * @var CustomerRepositoryInterface
     */
    private $goal;

    /**
     * CustomerController constructor.
     */

    public function __construct(GoalRepository $goal)
    {
        $this->goal= $goal;
    }

    public function index()
    {

        if (request()->ajax()) {
            return Datatables::of($this->goal->all())
                ->addColumn(
                    'action',
                    '
                    <button data-href="{{action(\'App\Http\Controllers\Admin\Goal\GoalController@edit\', [$id])}}" class="btn btn-xs btn-primary btn-modal" data-container="#ajax_modal"><i class="glyphicon glyphicon-edit"></i> @lang("Edit")</button>
                    &nbsp;

                    <button data-href="{{action(\'App\Http\Controllers\Admin\Goal\GoalController@show\', [$id])}}" class="btn btn-xs btn-info btn-modal" data-container="#ajax_modal"><i class="glyphicon glyphicon-edit"></i> @lang("View")</button>
                    &nbsp;

                    <button data-href="{{action(\'App\Http\Controllers\Admin\Goal\GoalController@destroy\', [$id])}}" class="btn btn-xs btn-danger delete_button"><i class="glyphicon glyphicon-trash"></i> @lang("Delete")</button>'
                )

                ->editColumn('name', function ($row) {

                    return  $row->name;
                })




                ->rawColumns(['action'])
                ->make(true);

        }
                return view('admin.goal.index');
    }


    public function create(Request $request)
    {
           $subject = Subject::pluck('subject_name' ,'id');
        $subject = Subject::pluck('Credit' ,'id');
        return view('admin.goal.create')->with(compact('subject'));

    }

    public function edit($id)
    {
       $goal = Goal::where('id', $id)->first();
       // $authCustomer = AuthCustomer::where('id',$customer->customer_id)->first();
        return view('admin.goal.edit')->with(compact('goal'));

    }

    public function show($id)
    {
     $goal= Goal::where('id', $id)->first();
    return view('admin.goal.view')->with(compact('goal'));

    }

    public function store(CreateGoalRequest $request)
    {
        return $this->goal->store();
    }

    public function update(UpdateGoalRequest $request, $id)
    {
      return $this->goal->update($id);
    }


    public function destroy($id)
    {

        if (request()->ajax()) {
            return $this->goal->delete($id);
        }
    }
}
