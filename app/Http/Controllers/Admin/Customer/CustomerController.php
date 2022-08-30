<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Models\Customer;
use App\Models\AuthCustomer;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\User\CustomerRepository;
use App\Http\Controllers\Admin\Customer\Requests\CreateCustomerRequest;
use App\Http\Controllers\Admin\Customer\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * @var CustomerRepositoryInterface
     */
    private $customer;

    /**
     * CustomerController constructor.
     */

    public function __construct(CustomerRepository $customer)
    {
        $this->customer = $customer;
    }

    public function index()
    {

        if (request()->ajax()) {
            return Datatables::of($this->customer->all())
                ->addColumn(
                    'action',
                    '
                    <button data-href="{{action(\'App\Http\Controllers\Admin\Customer\CustomerController@edit\', [$id])}}" class="btn btn-xs btn-primary btn-modal" data-container="#ajax_modal"><i class="glyphicon glyphicon-edit"></i> @lang("Edit")</button>
                    &nbsp;

                    <button data-href="{{action(\'App\Http\Controllers\Admin\Customer\CustomerController@show\', [$id])}}" class="btn btn-xs btn-info btn-modal" data-container="#ajax_modal"><i class="glyphicon glyphicon-edit"></i> @lang("View")</button>
                    &nbsp;

                    <button data-href="{{action(\'App\Http\Controllers\Admin\Customer\CustomerController@destroy\', [$id])}}" class="btn btn-xs btn-danger delete_button"><i class="glyphicon glyphicon-trash"></i> @lang("Delete")</button>'
                )

                ->editColumn('name', function ($row) {

                    return  $row->name;
                })




                ->rawColumns(['action'])
                ->make(true);

        }
                return view('admin.customer.index');
    }


    public function create(Request $request)
    {
          return view('admin.customer.create');

    }

    public function edit($id)
    {
       $customer = Customer::where('id', $id)->first();
       $authCustomer = AuthCustomer::where('id',$customer->customer_id)->first();
        return view('admin.customer.edit')->with(compact('customer','authCustomer'));

    }

    public function show($id)
    {
     $customer= Customer::where('id', $id)->first();
    return view('admin.customer.view')->with(compact('customer'));

    }

    public function store(CreateCustomerRequest $request)
    {
        return $this->customer->store();
    }

    public function update(UpdateCustomerRequest $request, $id)
    {
      return $this->customer->update($id);
    }


    public function destroy($id)
    {

        if (request()->ajax()) {
            return $this->customer->delete($id);
        }
    }
}
