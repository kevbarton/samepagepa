@extends('layouts.app')
@section('pageTitle','Samepage')
@section('bodyClass','bg-light')
@section('mainClass','page-wrapper')
@section('containerClass','container pb-100 pt-5')
@section('content')
<div class="navigation-control">
    <button type="button" id="btnclose" class="btn-close btn-close-dark btn-nav" aria-label="Close"></button>
</div>
<div class="steps">
    <div class="registrationstep" id="step-1">
        <div class="page-description pt-5 mt-2">
            <h5 class="text-dark mb-3">Let's get you set up </h5>
            <h1 class="text-dark mb-0 font-weight-bold">What's your phone number?</h1>
        </div>

        <form id="frmstep1" class="pt-5 single-field-form needs-validation" method="post" novalidate>
            @csrf
                <div class="form-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="phone" name="phone"  placeholder="Your phone number" autofocus>
                        <div class="invalid-feedback">
                            Your phone number
                        </div>
                    </div>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
        </form>
    </div>
    <div class="registrationstep" id="step-2">
        <div class="page-description pt-5 mt-2">
            <h5 class="text-dark mb-3">Checking you're human</h5>
            <h1 class="text-dark mb-0 font-weight-bold">Enter the code sent to <span id="rphone"></span></h1>
        </div>

        <form id="frmstep2" class="pt-5 single-field-form needs-validation" method="post" novalidate>
            @csrf
                <div class="form-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="verificationcode" name="verificationcode"  placeholder="Verification code" autofocus>
                        <div class="invalid-feedback">
                            Verification code
                        </div>
                    </div>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
        </form>
    </div>
    <div  class="registrationstep" id="step-3" >
        <div class="page-description pt-5 mt-2">
            <h5 class="text-dark mb-3">Introduce yourself</h5>
            <h1 class="text-dark mb-0 font-weight-bold">What's your first name?</h1>
        </div>

        <form id="frmstep3" class="pt-5 single-field-form needs-validation" novalidate method="POST">
            @csrf
                <div class="form-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name" autofocus >
                        <div class="invalid-feedback">
                            First name
                        </div>
                    </div>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
        </form>
    </div>
    <div class="registrationstep" id="step-4">
        <div class="page-description pt-5 mt-2">
            <h5 class="text-dark mb-3">Hi 👋 <span id="rfname"></span></h5>
            <h1 class="text-dark mb-0 font-weight-bold">What's your family name?</h1>
        </div>

        <form id="frmstep4" class="pt-5 single-field-form needs-validation" novalidate method="POST">
            @csrf
            <div class="form-body">
                <div class="mb-3">
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Family name" autofocus >
                    <div class="invalid-feedback">
                        Family name
                    </div>
                </div>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>
    <div class="registrationstep" id="step-5">
        <div class="page-description pt-5 mt-2">
            <h5 class="text-dark mb-3">Nearly done</h5>
            <h1 class="text-dark mb-0 font-weight-bold">What's your email address?</h1>
        </div>

        <form id="frmstep5" class="pt-5 single-field-form needs-validation" novalidate method="POST">
            @csrf
            <div class="form-body">
                <div class="mb-3">
                    <input type="text" class="form-control" id="email" name="email"  placeholder="Your email" autofocus>
                    <div class="invalid-feedback">
                        Your email
                    </div>
                </div>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>
    <div class="registrationstep" id="step-6">
        <div class="page-description pt-5 mt-2">
            <h5 class="text-dark mb-3">Nearly done</h5>
            <h1 class="text-dark mb-0 font-weight-bold">Set up your password</h1>
        </div>

        <form id="frmstep6" class="pt-5 single-field-form needs-validation" novalidate method="POST">
            @csrf
            <div class="form-body">
                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password"  placeholder="Your password" autofocus>
                    <div class="invalid-feedback">
                        Your password
                    </div>
                </div>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>
</div>

@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        let currentStep=1;
        let data={};
        function toggleStep(){
            $('.registrationstep').hide();
            $('#step-'+currentStep).show();
        }
        $('#btnclose').click(function(e){
            e.preventDefault();
            if(currentStep>1){
                currentStep--;
                toggleStep();
            }else{
                window.location='{{route('appindex')}}';
            }
        })
        $('#frmstep1').submit(function(e){
            e.preventDefault();
            frm=$(this);
            frm.find('.invalid-feedback').empty();
            frm.find('#phone').removeClass('is-invalid');
            if(frm.find('#phone').val()==''){
                frm.find('#phone').addClass('is-invalid');
                frm.find('.invalid-feedback').html('Please enter your phone number');
            }else{
                data.phone=frm.find('#phone').val();
                data._token=frm.find('[name="_token"]').val();
                $.post('{{route('appregistercheckphone')}}',data,function(dt){
                    if(dt.error){
                        frm.find('#phone').addClass('is-invalid');
                        frm.find('.invalid-feedback').html(dt.msg);
                    }else{
                        data=dt.data;
                        currentStep=2;
                        toggleStep();
                        $('#rphone').html(data.phone)
                    }
                },'json');
            }
        });
        $('#frmstep2').submit(function(e){
            e.preventDefault();
            frm=$(this);
            frm.find('.invalid-feedback').empty();
            frm.find('#verificationcode').removeClass('is-invalid');
            if(frm.find('#verificationcode').val()==''){
                frm.find('#verificationcode').addClass('is-invalid');
                frm.find('.invalid-feedback').html('Invalid Verification Code');
            }else{
                data.verificationcode=frm.find('#verificationcode').val();
                data._token=frm.find('[name="_token"]').val();
                $.post('{{route('appregistercheckverificationcode')}}',data,function(dt){
                    if(dt.error){
                        frm.find('#verificationcode').addClass('is-invalid');
                        frm.find('.invalid-feedback').html(dt.msg);
                    }else{
                        data=dt.data;
                        console.log(data);
                        currentStep=3;
                        toggleStep();
                    }
                },'json');
            }
        });
        $('#frmstep3').submit(function(e){
            e.preventDefault();
            frm=$(this);
            frm.find('.invalid-feedback').empty();
            frm.find('#first_name').removeClass('is-invalid');
            if(frm.find('#first_name').val()==''){
                frm.find('#first_name').addClass('is-invalid');
                frm.find('.invalid-feedback').html('Please Enter First Name');
            }else{
                data.first_name=frm.find('#first_name').val();
                currentStep=4;
                toggleStep();
                $('#rfname').html(data.first_name);
            }
        });
        $('#frmstep4').submit(function(e){
            e.preventDefault();
            frm=$(this);
            frm.find('.invalid-feedback').empty();
            frm.find('#last_name').removeClass('is-invalid');
            if(frm.find('#last_name').val()==''){
                frm.find('#last_name').addClass('is-invalid');
                frm.find('.invalid-feedback').html('Please Enter Family Name');
            }else{
                data.last_name=frm.find('#last_name').val();
                currentStep=5;
                toggleStep();
            }
        });
        $('#frmstep5').submit(function(e){
            e.preventDefault();
            frm=$(this);
            frm.find('.invalid-feedback').empty();
            frm.find('#email').removeClass('is-invalid');
            if(frm.find('#email').val()==''){
                frm.find('#email').addClass('is-invalid');
                frm.find('.invalid-feedback').html('Please enter a valid email');
            }else{
                data.email=frm.find('#email').val();
                data._token=frm.find('[name="_token"]').val();
                $.post('{{route('appregistercheckemail')}}',data,function(dt){
                    if(dt.error){
                        frm.find('#email').addClass('is-invalid');
                        frm.find('.invalid-feedback').html(dt.msg);
                    }else{
                        data=dt.data;
                        currentStep=6;
                        toggleStep();
                    }
                },'json');
            }
        });
        $('#frmstep6').submit(function(e){
            e.preventDefault();
            frm=$(this);
            frm.find('.invalid-feedback').empty();
            frm.find('#password').removeClass('is-invalid');
            if(frm.find('#password').val()==''){
                frm.find('#password').addClass('is-invalid');
                frm.find('.invalid-feedback').html('Password is required');
            }else{
                data.password=frm.find('#password').val();
                data._token=frm.find('[name="_token"]').val();
                $.post('{{route('appregistercheckpassword')}}',data,function(dt){
                    if(dt.error){
                        frm.find('#password').addClass('is-invalid');
                        frm.find('.invalid-feedback').html(dt.msg);
                    }else{
                        data=dt.data;
                        window.location='{{route('appusergetstarted')}}';
                    }
                },'json');
            }

        });
        //console.log(currentStep);
        toggleStep();
    });
</script>
@endpush
