@extends('layouts.app')
@section('pageTitle','Samepage')
@section('bodyClass','bg-light')
@section('mainClass','page-wrapper')
@section('containerClass','container pb-100 pt-5')
@section('content')
<div class="navigation-control">
    <button type="button" class="btn-close btn-close-dark btn-nav" aria-label="Close" id="btnclose"></button>

</div>
<div class="loginsteps">
    <div class="loginstep" id="step-1">
        <div class="page-description pt-5 mt-2">
            <h5 class="text-dark mb-3">Let's log back in </h5>
            <h1 class="text-dark mb-0 font-weight-bold">What's your email address?</h1>
        </div>

        <form id="frmloginstep1" class="pt-5 single-field-form needs-validation" novalidate method="post">
            @csrf
            <div class="form-body">
                <div class="mb-3">
                    <input type="text" class="form-control" id="email" name="email"  placeholder="Your email address" autofocus >
                    <div class="invalid-feedback">
                        Your email address
                    </div>
                </div>
            </div>
            <div class="form-footer text-center">
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>

        <div class="footer-button-wrapper text-center">
            <a href="{{route('app.forgotpassword')}}" class="text-link text-dark font-weight-bold">Reset password</a>
        </div>
    </div>
    <div class="loginstep" id="step-2">
        <div class="page-description pt-5 mt-2">
            <h5 class="text-dark mb-3">Good to have you back &#128525;</h5>
            <h1 class="text-dark mb-0 font-weight-bold">Enter your password</h1>
        </div>

        <form id="frmloginstep2" class="pt-5 single-field-form needs-validation" novalidate method="post">
            @csrf
                <div class="form-body">
                    <div class="input-group mb-3 pw">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Your password" autofocus>
                        <button class="btn btn-light w-auto" type="button"><i class="fa-regular fa-eye-slash" ></i></button>
                        <div class="invalid-feedback">
                            Your password
                        </div>
                    </div>
                </div>
                <div class="form-footer text-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
        </form>

        <div class="footer-button-wrapper text-center">
            <a href="forgotten-password.html" class="text-link text-dark font-weight-bold">Reset password</a>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        let currentStep=1;
        let data={};
        function toggleStep(){
            $('.loginstep').hide();
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

        $('#frmloginstep1').submit(function(e){
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
                $.post('{{route('applogincheckemail')}}',data,function(dt){
                    if(dt.error){
                        frm.find('#email').addClass('is-invalid');
                        frm.find('.invalid-feedback').html(dt.msg);
                    }else{
                        data=dt.data;
                        currentStep=2;
                        toggleStep();
                    }
                },'json');
            }
        });
        $('#frmloginstep2').submit(function(e){
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
                $.post('{{route('applogincheckpassword')}}',data,function(dt){
                    if(dt.error){
                        frm.find('#password').addClass('is-invalid');
                        frm.find('.invalid-feedback').html(dt.msg);
                    }else{
                        data=dt.data;
                        window.location='{{route('app.user.home')}}';
                    }
                },'json');
            }

        });
        //console.log(currentStep);
        toggleStep();
        $('.pw .btn').click(function(){
            if($(this).parent().find('input').attr('type')=='password'){
                $(this).parent().find('input').attr('type','text')
                $(this).parent().find('i').removeClass('fa-eye-slash').addClass('fa-eye')
            }else{
                $(this).parent().find('input').attr('type','password')
                $(this).parent().find('i').removeClass('fa-eye').addClass('fa-eye-slash')
            }
        })
    });
</script>
@endpush
