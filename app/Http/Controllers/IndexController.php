<?php

namespace App\Http\Controllers;

use App\Models\BuyerRequest;
use App\Models\Category;
use App\Models\Contact;
use App\Models\ContactUs;
use App\Models\Item;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->item = new Item();
        $this->category = new Category();
        $this->buyerrequest = new BuyerRequest();
        $this->contactus = new ContactUs();
    }

    public function index(){
        return view('frontend.index',[
            'items'=>$this->item->getItemsAtRandom()
        ]);
    }

    public function marketplace(){

        return view('frontend.marketplace',[
            'items'=>$this->item->getItemsAtRandom(),
            'categories'=>$this->category->getAllGeneralCategories()
        ]);
    }

    public function viewItem($slug){
        $item = $this->item->getItemBySlug($slug);
        if(!empty($item)){
            return view('frontend.view-item',['item'=>$item]);
        }else{
            return back();
        }
    }

    public function contactUs(){
        return view('frontend.contact-us');
    }

    public function buyerRequest(Request $request){
        $this->validate($request,[
            'item'=>'required',
            'first_name'=>'required',
            'email'=>'required|email',
            'mobile_no'=>'required',
            'message'=>'required'
        ],[
            'first_name.required'=>'Enter your first name',
            'email.required'=>'Enter your email address',
            'email.email'=>'Enter a valid email address',
            'mobile.required'=>'Enter your mobile number',
            'message.required'=>'Type your message in the field provided',
        ]);

        $item = $this->item->getItemById($request->item);
        if(!empty($item)){
            $this->buyerrequest->setNewBuyerRequest($request, $item->tenant_id);
            session()->flash("success", "Your request was submitted successfully.");
            return back();
        }else{
            return back();
        }
    }

    public function saveContactUs(Request $request){
        $this->validate($request,[
            'first_name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'mobile_no'=>'required',
            'message'=>'required'
        ],[
            'first_name.required'=>'Enter your first name',
            'email.required'=>'Enter your email address',
            'email.email'=>'Enter a valid email address',
            'mobile_no.required'=>'Enter mobile no.',
            'message.required'=>'Help us understand your concerns. Type your message.'
        ]);
        $this->contactus->setNewContactUs($request);
        session()->flash("success", "<strong>Thank you!</strong> Your message was sent successfully. You'll hear from us soonest.");
        return back();
    }
}
