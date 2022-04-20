@extends('client.layout.clientdashboard')
@section('content')

@if($do == 'Manage')
    <div class="profile-container d-flex flex-wrap g-5  align-items-center">

        <div class=" align-self-center col-lg-4 col-md-5 col-11 d-flex flex-column align-items-center">
            <img src="assets/images/avatar.png" class="rounded-circle " alt="">

            <p class="profilename fs-5 text-center col-lg-8 mt-4"> {{ $user->name }} </p>
            <div class="col-8 d-flex justify-content-center gap-2 mt-2">

                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <em class=" text-white mx-1 fs-5">8.8</em>
            </div>
            <a href="editprofile?do=Edit&">

                <p style="background-color: var(--yellow);
                    padding:0.8rem;
                    margin-top:1rem;" class="prrofile"> تعديل الصورة الشخصية</p>
            </a>

        </div>


        <div class=" col-lg-5 col-md-5 col-10 m-lg-0 m-auto text-white text-end">
            <h4 class="text-warning text-center fs-4  m-2">
                المعلومات الشخصية
            </h4>
            <h5 class=" mt-4 mb-3">معلومات التواصل </h5>

            <div>
                <form action="">
                    <table class="table-profile table-editprofile ">


                        <tr>
                            <th>
                                اسم المستخدم
                            </th>
                            <td>
                                <input type="text" value="{{ $user->name }} ">
                                <input type="hidden" name="image" value="{{ $user->profile->image}} ">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                البريد الالكتروني
                            </th>
                            <td>
                                <input type="text" value="{{ $user->email }}">
                            </td>
                        </tr>


                        <tr>
                            <th>
                                كلمة السر
                            </th>
                            <td>
                                <input type="password" value="{{ $user->password }}">
                            </td>
                        </tr>
                        <th>
                            رقم التلفون
                        </th>
                        <td>
                            <input type="text" value="{{ $user->profile->phone }}">
                        </td>
                        </tr>

                        <th>
                            العنوان
                        </th>
                        <td>
                            <input type="text" value=" {{ $user->profile->address }}">
                        </td>
                        </tr>

                    </table>
            </div>



            <h5 class=" mt-5">معلومات الدفع </h5>

            <div>
                <table class="table-profile table-editprofile">

                    <tr>
                        <th>
                            طريقة الدفع
                        </th>
                        <td>
                            <input type="text" value="  {{ $bank->name }}">
                        </td>
                    </tr>


                    <tr>
                        <th>
                            اسم البنك
                        </th>
                        <td>
                            <input type="text" value=" {{ $bank->bank_name }}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            رقم الحساب
                        </th>
                        <td>
                            <input type="text" value="  {{$acount}} ">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" class="btn btn-primary bg-yellow" value="حفظ التعديلات">
                        </td>

                    </tr>
                </table>


            </div>








        </div>

        </form>



    </div>
    @elseif($do == 'Edit')
    
    <h1 class="text-center fs-4 m-5"> تعديل الصورة </h1>
<form action="">
<div class=" col-1">
    <input class="image" type="file" name="image">
</div>
</form>
    @endif
@endsection
