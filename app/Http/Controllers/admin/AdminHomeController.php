<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\siteHome;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    function show()
    {
     return view('admin.dashboard', [
      
     ]);
    }

    function manageHome(){
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $content = siteHome::select()->get();
        return view('admin.adminManageHomeSite', [
            'Content' => $content,
            'do'     => $do
      
     ]);
    }

    function editContent(Request $request,$id){
        // return $request;
        $column =  $request->column;
        Validator::validate($request->all(),[
            "$request->column"=>['required', 'string', 'between: 5, 255'],
        ],[
            "$request->column.required"=>' هذا الحقل مطلوب ',
            "$request->column.string"=>' يحب ان يكون هذا الحقل نص  ',
            "$request->column.between"=>' يحب ان يكون الحقل  اكبر من 20 حرف واصغر من 255 حرف',]);

        print_r($request->$column) ;

        $home=siteHome::find($id);

        $home->$column  = $request->$column;
        if($home->save())

        
        return redirect('manage_home')
        ->with(['success'=>'تم التعديل  بنجاح']);
        return back()->with(['error'=>'خطاء لانستطيع التعديل ']);
    }
}
