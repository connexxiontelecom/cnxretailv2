<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\Subscription;
use App\Models\Tenant;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->adminuser = new AdminUser();
        $this->tenant = new Tenant();
        $this->subscription = new Subscription();
    }

    public function adminDashboard(){
        return view('admin.admin-dashboard',[
            'tenants'=>$this->tenant->getAllRegisteredTenants(),
            'thismonth'=>$this->tenant->getAllRegisteredTenantsThisMonth()
        ]);
    }

    public function showAddNewUserForm(){
        return view('admin.add-new-admin');
    }

    public function storeAdminUser(Request $request){
        $this->validate($request,[
            'full_name'=>'required',
            'email'=>'required|email|unique:admin_users,email',
            'mobile_no'=>'required',
            'password'=>'required'
        ],[
            'full_name.required'=>'Enter user full name',
            'email.required'=>'Enter a valid email address',
            'email.email'=>'Enter a valid email address',
            'email.unique'=>'This email address is already in use',
            'mobile_no.required'=>'Enter user mobile number',
            'password.required'=>'Choose password for user',
            //'password.confirmed'=>'Password'
        ]);
        $this->adminuser->createNewAdminUser($request);
        session()->flash("success","Your action was registered successfully.");
        return back();
    }

    public function manageTenants(){
        return view('admin.manage-tenants',['tenants'=>$this->tenant->getAllRegisteredTenants()]);
    }

    public function viewTenant($slug){
        $tenant = $this->tenant->getTenantBySlug($slug);
        if(!empty($tenant)){
            return view('admin.view-tenant', ['tenant'=>$tenant]);
        }else{
            session()->flash("error", "No record found.");
            return back();
        }
    }

    public function getTenantSubscriptions(){
        return view('admin.subscription',['subscriptions'=>$this->subscription->getTenantSubscriptions()]);
    }
}
