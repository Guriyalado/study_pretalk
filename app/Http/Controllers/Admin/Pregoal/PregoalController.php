<?php

namespace App\Http\Controllers\Admin\Pregoal;

use App\Models\Pregoal;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\User\PregoalRepository;
use App\Http\Controllers\Admin\Pregoal\Requests\CreatePregoalRequest;
use App\Http\Controllers\Admin\Pregoal\Requests\UpdatePregoalRequest;

class PregoalController extends Controller
{
    /**
     * @var CustomerRepositoryInterface
     */
    private $pregoal;

    /**
     * CustomerController constructor.
     */

    public function __construct(PregoalRepository $pregoal)
    {
        $this->pregoal = $pregoal;
    }

    public function index()
    {

        if (request()->ajax()) {
            return Datatables::of($this->pregoal->all())
                ->addColumn(
                    'action',
                    '
                    <button data-href="{{action(\'App\Http\Controllers\Admin\Pregoal\PregoalController@edit\', [$id])}}" class="btn btn-xs btn-primary btn-modal" data-container="#ajax_modal"><i class="glyphicon glyphicon-edit"></i> @lang("Edit")</button>
                    &nbsp;

                    <button data-href="{{action(\'App\Http\Controllers\Admin\Pregoal\PregoalController@show\', [$id])}}" class="btn btn-xs btn-info btn-modal" data-container="#ajax_modal"><i class="glyphicon glyphicon-edit"></i> @lang("View")</button>
                    &nbsp;

                    <button data-href="{{action(\'App\Http\Controllers\Admin\Pregoal\PregoalController@destroy\', [$id])}}" class="btn btn-xs btn-danger delete_button"><i class="glyphicon glyphicon-trash"></i> @lang("Delete")</button>'
                )

                ->editColumn('name', function ($row) {

                    return  $row->name;
                })




                ->rawColumns(['action'])
                ->make(true);

        }
                return view('admin.pregoal.index');
    }


    public function create(Request $request)
    {
          return view('admin.pregoal.create');

    }

    public function edit($id)
    {
       $pregoal = Pregoal::where('id', $id)->first();
       // $authCustomer = AuthCustomer::where('id',$customer->customer_id)->first();
        return view('admin.pregoal.edit')->with(compact('pregoal'));

    }

    public function show($id)
    {
     $pregoal= Pregoal::where('id', $id)->first();
    return view('admin.pregoal.view')->with(compact('pregoal'));

    }

    public function store(CreatePregoalRequest $request)
    {
        return $this->pregoal->store();
    }

    public function update(UpdatePregoalRequest $request, $id)
    {
      return $this->pregoal->update($id);
    }


    public function destroy($id)
    {

        if (request()->ajax()) {
            return $this->pregoal->delete($id);
        }
    }
}
