<?php

namespace App\Http\Controllers\Admin\Presetgoal;

use App\Models\Presetgoal;



use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\User\PresetgoalRepository;
use App\Http\Controllers\Admin\Presetgoal\Requests\CreatePresetgoalRequest;
use App\Http\Controllers\Admin\Presetgoal\Requests\UpdatePresetgoalRequest;

class PresetgoalController extends Controller
{
    /**
     * @var CustomerRepositoryInterface
     */
    private $presetgoal;

    /**
     * CustomerController constructor.
     */

    public function __construct(PresetgoalRepository $presetgoal)
    {
        $this->presetgoal= $presetgoal;
    }

    public function index()
    {

        if (request()->ajax()) {
            return Datatables::of($this->presetgoal->all())
                ->addColumn(
                    'action',
                    '
                    <button data-href="{{action(\'App\Http\Controllers\Admin\Presetgoal\PresetgoalController@edit\', [$id])}}" class="btn btn-xs btn-primary btn-modal" data-container="#ajax_modal"><i class="glyphicon glyphicon-edit"></i> @lang("Edit")</button>
                    &nbsp;

                    <button data-href="{{action(\'App\Http\Controllers\Admin\Presetgoal\PresetgoalController@show\', [$id])}}" class="btn btn-xs btn-info btn-modal" data-container="#ajax_modal"><i class="glyphicon glyphicon-edit"></i> @lang("View")</button>
                    &nbsp;

                    <button data-href="{{action(\'App\Http\Controllers\Admin\Presetgoal\PresetgoalController@destroy\', [$id])}}" class="btn btn-xs btn-danger delete_button"><i class="glyphicon glyphicon-trash"></i> @lang("Delete")</button>'
                )

                ->editColumn('name', function ($row) {

                    return  $row->name;
                })




                ->rawColumns(['action'])
                ->make(true);

        }
                return view('admin.presetgoal.index');
    }


    public function create(Request $request)
    {
        return view('admin.presetgoal.create')->with(compact('presetgoal'));

    }

    public function edit($id)
    {
       $presetgoal = Presetgoal::where('id', $id)->first();
       // $authCustomer = AuthCustomer::where('id',$customer->customer_id)->first();
        return view('admin.presetgoal.edit')->with(compact('presetgoal'));

    }

    public function show($id)
    {
     $presetgoal= Presetgoal::where('id', $id)->first();
    return view('admin.presetgoal.view')->with(compact('presetgoal'));

    }

    public function store(CreatePresetgoalRequest $request)
    {
        return $this->presetgoal->store();
    }

    public function update(UpdatePresetgoalRequest $request, $id)
    {
      return $this->presetgoal->update($id);
    }


    public function destroy($id)
    {

        if (request()->ajax()) {
            return $this->presetgoal->delete($id);
        }
    }
}
