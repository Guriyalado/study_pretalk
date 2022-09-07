<?php

namespace App\Http\Controllers\Admin\Activity;

use App\Models\Activity;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\User\ActivityRepository;
use App\Http\Controllers\Admin\Activity\Requests\CreateActivityRequest;
use App\Http\Controllers\Admin\Activity\Requests\UpdateActivityRequest;

class ActivityController extends Controller
{
    /**
     * @var CustomerRepositoryInterface
     */
    private $activity;

    /**
     * CustomerController constructor.
     */

    public function __construct(ActivityRepository $activity)
    {
        $this->activity = $activity;
    }

    public function index()
    {

        if (request()->ajax()) {
            return Datatables::of($this->activity->all())
                ->addColumn(
                    'action',
                    '
                    <button data-href="{{action(\'App\Http\Controllers\Admin\Activity\ActivityController@edit\', [$id])}}" class="btn btn-xs btn-primary btn-modal" data-container="#ajax_modal"><i class="glyphicon glyphicon-edit"></i> @lang("Edit")</button>
                    &nbsp;

                    <button data-href="{{action(\'App\Http\Controllers\Admin\Activity\ActivityController@show\', [$id])}}" class="btn btn-xs btn-info btn-modal" data-container="#ajax_modal"><i class="glyphicon glyphicon-edit"></i> @lang("View")</button>
                    &nbsp;

                    <button data-href="{{action(\'App\Http\Controllers\Admin\Activity\ActivityController@destroy\', [$id])}}" class="btn btn-xs btn-danger delete_button"><i class="glyphicon glyphicon-trash"></i> @lang("Delete")</button>'
                )

                ->editColumn('name', function ($row) {

                    return  $row->name;
                })




                ->rawColumns(['action'])
                ->make(true);

        }
                return view('admin.activity.index');
    }


    public function create(Request $request)
    {
          return view('admin.activity.create');

    }

    public function edit($id)
    {
       $activity = Activity::where('id', $id)->first();
       // $authCustomer = AuthCustomer::where('id',$customer->customer_id)->first();
        return view('admin.activity.edit')->with(compact('activity'));

    }

    public function show($id)
    {
     $activity= Activity::where('id', $id)->first();
    return view('admin.activity.view')->with(compact('activity'));

    }

    public function store(CreateActivityRequest $request)
    {
        return $this->activity->store();
    }

    public function update(UpdateActivityRequest $request, $id)
    {
      return $this->activity->update($id);
    }


    public function destroy($id)
    {

        if (request()->ajax()) {
            return $this->activity->delete($id);
        }
    }
}
