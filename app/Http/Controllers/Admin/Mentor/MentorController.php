<?php

namespace App\Http\Controllers\Admin\Mentor;

use App\Models\Mentor;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\User\MentorRepository;
use App\Http\Controllers\Admin\Mentor\Requests\CreateMentorRequest;
use App\Http\Controllers\Admin\Mentor\Requests\UpdateMentorRequest;

class MentorController extends Controller
{
    /**
     * @var CustomerRepositoryInterface
     */
    private $mentor;

    /**
     * CustomerController constructor.
     */

    public function __construct(MentorRepository $mentor)
    {
        $this->mentor = $mentor;
    }

    public function index()
    {

        if (request()->ajax()) {
            return Datatables::of($this->mentor->all())
                ->addColumn(
                    'action',
                    '
                    <button data-href="{{action(\'App\Http\Controllers\Admin\Mentor\MentorController@edit\', [$id])}}" class="btn btn-xs btn-primary btn-modal" data-container="#ajax_modal"><i class="glyphicon glyphicon-edit"></i> @lang("Edit")</button>
                    &nbsp;

                    <button data-href="{{action(\'App\Http\Controllers\Admin\Mentor\MentorController@show\', [$id])}}" class="btn btn-xs btn-info btn-modal" data-container="#ajax_modal"><i class="glyphicon glyphicon-edit"></i> @lang("View")</button>
                    &nbsp;

                    <button data-href="{{action(\'App\Http\Controllers\Admin\Mentor\MentorController@destroy\', [$id])}}" class="btn btn-xs btn-danger delete_button"><i class="glyphicon glyphicon-trash"></i> @lang("Delete")</button>'
                )

                ->editColumn('name', function ($row) {

                    return  $row->name;
                })




                ->rawColumns(['action'])
                ->make(true);

        }
                return view('admin.mentor.index');
    }


    public function create(Request $request)
    {
          return view('admin.mentor.create');

    }

    public function edit($id)
    {
       $mentor = Mentor::where('id', $id)->first();
       // $authCustomer = AuthCustomer::where('id',$customer->customer_id)->first();
        return view('admin.mentor.edit')->with(compact('mentor'));

    }

    public function show($id)
    {
     $mentor= Mentor::where('id', $id)->first();
    return view('admin.mentor.view')->with(compact('mentor'));

    }

    public function store(CreateMentorRequest $request)
    {
        return $this->mentor->store();
    }

    public function update(UpdateMentorRequest $request, $id)
    {
      return $this->mentor->update($id);
    }


    public function destroy($id)
    {

        if (request()->ajax()) {
            return $this->mentor->delete($id);
        }
    }
}
