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
            <h1 class="text-dark mb-0 font-weight-bold">Accept Invite</h1>
        </div>

        <form id="frmstep1" class="pt-5 single-field-form needs-validation" method="post" novalidate>
            @csrf
                <div class="form-body">
                    <div class="mb-3" id="emailblock">
                        <input type="text" class="form-control" id="email" name="email"  placeholder="Your email address" autofocus>
                        <div class="invalid-feedback">
                            Invalid Email
                        </div>
                    </div>
                    <div class="mb-3" id="invitecodeblock">
                        <input type="text" class="form-control" id="invitecode" name="invitecode"  placeholder="Invite Code" >
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
            <h5 class="text-dark mb-3">Nearly done</h5>
            <h1 class="text-dark mb-0 font-weight-bold">Set up your password</h1>
        </div>

        <form id="frmstep2" class="pt-5 single-field-form needs-validation" novalidate method="POST">
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
            frm.find('#email').removeClass('is-invalid');
            frm.find('#invitecode').removeClass('is-invalid');
            if(frm.find('#email').val()==''||frm.find('#invitecode').val()==''){
                if(frm.find('#email').val()==''){
                    frm.find('#email').addClass('is-invalid');
                    frm.find('#emailblock .invalid-feedback').html('Please enter a valid email address');
                }
                if(frm.find('#invitecode').val()==''){
                    frm.find('#email').addClass('is-invalid');
                    frm.find('#invitecodeblock .invalid-feedback').html('Please enter your invite code');
                }
            }else{
                data.email=frm.find('#email').val();
                data.invitecode=frm.find('#invitecode').val();
                data._token=frm.find('[name="_token"]').val();
                $.post('{{route('app.acceptinviteverify')}}',data,function(dt){
                    if(dt.error){
                        frm.find('#phone').addClass('is-invalid');
                        frm.find('.invalid-feedback').html(dt.msg);
                    }else{
                        data=dt.data;
                        currentStep=2;
                        toggleStep();
                      //  $('#rphone').html(data.phone)
                    }
                },'json');
            }
        });
       
        $('#frmstep2').submit(function(e){
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
                $.post('{{route('app.acceptinvitesetpassword')}}',data,function(dt){
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
