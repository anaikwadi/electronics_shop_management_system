<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use App\HomePageVideo;
use App\Vendor;
use App\Purchase;
use App\Customer;
use App\SaleSystem;




class HomeController extends Controller
{
    // Only Authenticated User have access to Dashboard
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show Dashboard Page
    public function index()
    {
        $data = [];
        $n_users = User::all()->count();
        $n_roles = Role::all()->count();
        $n_perms = Permission::all()->count();
        $n_logged = Auth::user()->name;
        $videos = HomePageVideo::OrderBy('sequence','asc')->paginate(10);

        $vendors = Vendor::paginate(10);

        $currentMonth = date('m');
        $purchase_report = Purchase::where([
            ['bill_number', '!=', 0],
            ])->whereRaw('MONTH(created_at) = ?',[$currentMonth])->get();

        $Customers = Customer::all();
        $sale_items = SaleSystem::whereRaw('MONTH(created_at) = ?',[$currentMonth])->get();


        $data = [
            'n_users' => $n_users,
            'n_roles' => $n_roles,
            'n_perms' => $n_perms,
            'n_logged' => $n_logged,
            'videos' => $videos,
            'vendors' => $vendors,
            'purchase_report' => $purchase_report,
            'Customers' => $Customers,
            'sale_items' => $sale_items,

        ];
        return view('admin.dashboard',$data);
    }

   
    

}
