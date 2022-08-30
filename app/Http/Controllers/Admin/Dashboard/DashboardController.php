<?php
namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Distributor;
use App\Models\Retailer;
use App\Models\Bill;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
class DashboardController extends Controller
{

    public function index()
    {

      return view('admin.layouts.dashboard');
    }
}
