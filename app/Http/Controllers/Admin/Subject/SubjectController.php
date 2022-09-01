<?php

namespace App\Http\Controllers\Admin\Subject;

use App\Models\Subject;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\User\SubjectRepository;
use App\Http\Controllers\Admin\Subject\Requests\CreateSubjectRequest;
use App\Http\Controllers\Admin\Subject\Requests\UpdateSubjectRequest;

class SubjectController extends Controller
{
    /**
     * @var CustomerRepositoryInterface
     */
    private $subject;

    /**
     * CustomerController constructor.
     */

    public function __construct(SubjectRepository $subject)
    {
        $this->subject = $subject;
    }

    public function index()
    {

        if (request()->ajax()) {
            return Datatables::of($this->subject->all())
                ->addColumn(
                    'action',
                    '
                    <button data-href="{{action(\'App\Http\Controllers\Admin\Subject\SubjectController@edit\', [$id])}}" class="btn btn-xs btn-primary btn-modal" data-container="#ajax_modal"><i class="glyphicon glyphicon-edit"></i> @lang("Edit")</button>
                    &nbsp;

                    <button data-href="{{action(\'App\Http\Controllers\Admin\Subject\SubjectController@show\', [$id])}}" class="btn btn-xs btn-info btn-modal" data-container="#ajax_modal"><i class="glyphicon glyphicon-edit"></i> @lang("View")</button>
                    &nbsp;

                    <button data-href="{{action(\'App\Http\Controllers\Admin\Subject\SubjectController@destroy\', [$id])}}" class="btn btn-xs btn-danger delete_button"><i class="glyphicon glyphicon-trash"></i> @lang("Delete")</button>'
                )

                ->editColumn('name', function ($row) {

                    return  $row->name;
                })




                ->rawColumns(['action'])
                ->make(true);

        }
                return view('admin.subject.index');
    }


    public function create(Request $request)
    {
          return view('admin.subject.create');

    }

    public function edit($id)
    {
       $subject = Subject::where('id', $id)->first();
       // $authCustomer = AuthCustomer::where('id',$customer->customer_id)->first();
        return view('admin.subject.edit')->with(compact('subject'));

    }

    public function show($id)
    {
     $subject= Subject::where('id', $id)->first();
    return view('admin.subject.view')->with(compact('subject'));

    }

    public function store(CreateSubjectRequest $request)
    {
        return $this->subject->store();
    }

    public function update(UpdateSubjectRequest $request, $id)
    {
      return $this->subject->update($id);
    }


    public function destroy($id)
    {

        if (request()->ajax()) {
            return $this->subject->delete($id);
        }
    }
}
