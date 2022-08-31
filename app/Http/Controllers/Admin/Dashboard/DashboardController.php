<?php
namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Mentor;
use App\Models\Customer;
// use App\Models\Bill;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
class DashboardController extends Controller
{
 public function index()
    {
        $mentor_count= Mentor::count();
        $customer_count=Customer::count();
       

     return view('admin.layouts.dashboard',["mentor"=>$mentor_count,"customer"=>$customer_count]);
    }


     public function all()
    {
        $result=Customer::all();
        return view('admin/customer/view',$result);
    }
}

