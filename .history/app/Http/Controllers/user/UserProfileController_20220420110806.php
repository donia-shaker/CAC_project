<?php

namespace App\Http\Controllers\user;
use App\Models\Payment;
use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use App\Models\PaymentMethode;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function show()
    {
      $id=Auth::id();

     // $models = Models::select()->where('id', $modelid)->find($modelid);
      $payment =  PaymentMethode::All();
      $profile = UserProfile::find($id);
    //  return $profile.$payment;
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $payment = Payment::select()->get();
        return view('client.profile', [
            'profile' => $profile, 
              'Payment' => $payment,
            'do' => $do
        ]);

    }




    function edit(Request $request,$id){


   $category=payment::find($id);
      $category->name=$request->name;
     $old=$request->image_old;

     if($request->active==null)
      $category->is_active=0;
      else 
      $category->is_active=1;
      
      if($request->hasFile('image'))
      $category->image=$this->uploadFile($request->file('image'));
      else
      $category->image=$old;
      if($category->save())

    
      return redirect('admincategories')
      ->with(['success'=>'تم تعديل التصنيف بنجاح']);
      return back()->with(['error'=>'خطاء لانستطيع اضافة التصنيف']);
  }








}
