@extends('layouts.app')
@section('pageTitle','Samepage')
@section('bodyClass','')
@section('mainClass','page-wrapper wallet-pages pt-4')
@section('containerClass','container pb-100 pt-4')
@section('title','Wallets')
@section('backlink',route('appusergetstarted.menu'))
@section('content')
<div class="wallet-cards-wrapper">
                @if(auth()->user()->wallets()->where('slug','life-admin')->first())
                    <div class="wallet-card d-flex justify-content-center align-items-center">
                        <span class="color-bar" style="background-color: {{auth()->user()->wallets()->where('slug','life-admin')->first()->colour}};"></span>
                        <h6 class="mb-0">{{auth()->user()->wallets()->where('slug','life-admin')->first()->name}} 📋<span class="icon-wrapper"></span></h6>
                        <div class="ms-auto d-flex text-end">
                            <a href="" class="btn py-0 h-auto " data-bs-toggle="dropdown" aria-expanded="false">...</a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editwallet" data-wallet="{{auth()->user()->wallets()->where('slug','life-admin')->first()->id}}" href="#">Edit</a></li>
                                <li><a class="dropdown-item"  href="{{route('app.wallets.lifeadmin')}}">View</a></li>
                                
                            </ul>
                        </div>
                    </div>
                @endif
                @if(auth()->user()->wallets()->where('slug','vehicle')->first())
                    <div class="wallet-card d-flex justify-content-center align-items-center">
                        <span class="color-bar" style="background-color: {{auth()->user()->wallets()->where('slug','vehicle')->first()->colour}};"></span>
                        <h6 class="mb-0">{{auth()->user()->wallets()->where('slug','vehicle')->first()->name}}<span class="icon-wrapper"></span></h6>
                        <div class="ms-auto d-flex text-end">
                            <a href="" class="btn py-0 h-auto " data-bs-toggle="dropdown" aria-expanded="false">...</a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editwallet" data-wallet="{{auth()->user()->wallets()->where('slug','vehicle')->first()->id}}" href="#">Edit</a></li>
                                <li><a class="dropdown-item"  href="{{route('app.wallets.vehicles')}}">View</a></li>
                                <li><a class="dropdown-item" href="{{route('app.deletewallet',['wallet'=>auth()->user()->wallets()->where('slug','vehicle')->first()->id])}}">Delete</a></li>
                            </ul>
                        </div>
                    </div>
                @endif
                @if(auth()->user()->wallets()->where('slug','pets')->first())
                    <div class="wallet-card d-flex justify-content-center align-items-center">
                        <span class="color-bar" style="background-color: {{auth()->user()->wallets()->where('slug','pets')->first()->colour}};"></span>
                        <h6 class="mb-0">{{auth()->user()->wallets()->where('slug','pets')->first()->name}} 🐕<span class="icon-wrapper"></span></h6>
                        <div class="ms-auto d-flex text-end">
                            <a href="" class="btn py-0 h-auto " data-bs-toggle="dropdown" aria-expanded="false">...</a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editwallet" data-wallet="{{auth()->user()->wallets()->where('slug','pets')->first()->id}}" href="#">Edit</a></li>
                                <li><a class="dropdown-item"  href="{{route('app.wallets.pets')}}">View</a></li>
                                <li><a class="dropdown-item" href="{{route('app.deletewallet',['wallet'=>auth()->user()->wallets()->where('slug','pets')->first()->id])}}">Delete</a></li>
                            </ul>
                        </div>
                    </div>
                @endif
                @if(auth()->user()->wallets()->where('slug','home')->first())
                    <div class="wallet-card d-flex justify-content-center">
                        <span class="color-bar" style="background-color: {{auth()->user()->wallets()->where('slug','home')->first()->colour}};"></span>
                        <h6 class="mb-0">{{auth()->user()->wallets()->where('slug','home')->first()->name}} 🏠<span class="icon-wrapper"></span></h6>
                        <div class="ms-auto d-flex text-end">
                            <a href="" class="btn py-0 h-auto " data-bs-toggle="dropdown" aria-expanded="false">...</a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editwallet" data-wallet="{{auth()->user()->wallets()->where('slug','home')->first()->id}}" href="#">Edit</a></li>
                                <li><a class="dropdown-item"  href="{{route('app.wallets.homes')}}">View</a></li>
                               
                            </ul>
                        </div>
                    </div>
                @endif
                <div class="wallet-card d-flex justify-content-center align-items-center">
                    <span class="color-bar" style="background-color: #DA6F63;"></span>
                    <h6 class="mb-0">Family ❤️<span class="icon-wrapper"></span></h6>
                    <div class="ms-auto d-flex text-end">
                        <a  class="btn py-0 h-auto "  data-bs-toggle="dropdown">...</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item"  href="{{route('appusergetstarted.familymembers')}}">View</a></li>
                            
                        </ul>
                    </div>
                </div>

                <div class="wallet-card d-flex justify-content-center align-items-center">
                    <span class="color-bar" style="background-color: #B5DC67;"></span>
                    <h6 class="mb-0">Birthdays & anniversaries 🎁<span class="icon-wrapper"></span></h6>
                    <div class="ms-auto d-flex text-end">
                    <a  class="btn py-0 h-auto "  data-bs-toggle="dropdown">...</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item"  href="#">View</a></li>
                            
                        </ul>
                    </div>
                </div>
                @if(auth()->user()->wallets()->where('slug','insurance')->first())
                    <div class="wallet-card d-flex justify-content-center align-items-center">
                        <span class="color-bar" style="background-color: {{auth()->user()->wallets()->where('slug','insurance')->first()->colour}};"></span>
                        <h6 class="mb-0">{{auth()->user()->wallets()->where('slug','insurance')->first()->name}}<span class="icon-wrapper"></span></h6>
                        <div class="ms-auto d-flex text-end">
                            <a href="" class="btn py-0 h-auto " data-bs-toggle="dropdown" aria-expanded="false">...</a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editwallet" data-wallet="insurance" data-wallet="{{auth()->user()->wallets()->where('slug','insurance')->first()->id}}"  href="#">Edit</a></li>
                                <li><a class="dropdown-item"  href="{{route('app.wallets.insurances')}}">View</a></li>
                                <li><a class="dropdown-item" href="{{route('app.deletewallet',['wallet'=>auth()->user()->wallets()->where('slug','insurance')->first()->id])}}">Delete</a></li>
                            </ul>
                        </div>
                    </div>
                @endif
                @if(auth()->user()->wallets()->where('slug','holidays')->first())
                    <div class="wallet-card d-flex justify-content-center">
                        <span class="color-bar" style="background-color: {{auth()->user()->wallets()->where('slug','holidays')->first()->colour}};"></span>
                        <h6 class="mb-0">{{auth()->user()->wallets()->where('slug','holidays')->first()->name}}<span class="icon-wrapper"></span></h6>
                        <div class="ms-auto d-flex text-end">
                        <a  class="btn py-0 h-auto "  data-bs-toggle="dropdown">...</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item"  href="#">View</a></li>
                            
                        </ul>
                        </div>
                    </div>
                @endif
            </div>
            @if(auth()->user()->wallets()->count()<6)
            <!-- Sugession Button Wrapper -->
            <div class="suggesion-button-wrap mt-4">
                <button class="suggesion-button btn btn-primary">AI Suggested Wallets</button>
                @if(!auth()->user()->wallets()->where('slug','vehicle')->first())
                    <div class="wallet-card d-flex justify-content-center align-items-center">
                        <span class="color-bar" style="background-color: #DBFF4F;"></span>
                        <h6 class="mb-0">Vehicle<span class="icon-wrapper"></span></h6>
                        <a  class="details ms-auto ps-2" href="{{route('app.adduserwallet',['wallet'=>'vehicle'])}}">Add</a>
                    </div>
                @endif
                @if(!auth()->user()->wallets()->where('slug','pets')->first())
                    <div class="wallet-card d-flex justify-content-center align-items-center">
                        <span class="color-bar" style="background-color: #37A0A6;"></span>
                        <h6 class="mb-0">Pets 🐕<span class="icon-wrapper"></span></h6>
                        <a  class="details ms-auto ps-2" href="{{route('app.adduserwallet',['wallet'=>'pets'])}}">Add</a>
                    </div>
                @endif
                @if(!auth()->user()->wallets()->where('slug','insurance')->first())
                    <div class="wallet-card d-flex justify-content-center align-items-center">
                        <span class="color-bar" style="background-color: #DBFF4F;"></span>
                        <h6 class="mb-0">Insurance<span class="icon-wrapper"></span></h6>
                        <a class="details ms-auto ps-2" href="{{route('app.adduserwallet',['wallet'=>'insurance'])}}">Add</a>
                    </div>
                @endif
                @if(!auth()->user()->wallets()->where('slug','holidays')->first())
                    <div class="wallet-card d-flex justify-content-center align-items-center">
                        <span class="color-bar" style="background-color: #DBFF4F;"></span>
                        <h6 class="mb-0">Holidays<span class="icon-wrapper"></span></h6>
                        <a  class="details ms-auto ps-2" href="{{route('app.adduserwallet',['wallet'=>'holidays'])}}">Add</a>
                    </div>
                @endif
            </div>
            @endif
            @if(!auth()->user()->wallets()->where('slug','vehicle')->first())
                <div class="wallet-popup-wrapper" id="wallet-popup-wrapper">
                    <div class="wallet-popup-overlay"></div>
                    <div class="popup-content-wrap w-100 bg-light py-4 px-3 align-self-end d-flex justify-content-center">
                        <div class="popup-content d-flex flex-column justify-content-center align-items-center">
                            <h6 class="icon-heading text-dark mb-3 text-center">AI Suggestions</h6>
                            <h3 class="main-heading text-dark mb-4 text-center">Do you have a vehicle?</h3>
                            <a class="btn btn-primary mb-4" href="{{route('app.adduserwallet',['wallet'=>'vehicle'])}}">Yes - add new Wallet</a>
                            <a class="close-btn btn" id="wallet-ai-close">No, close window</a>
                        </div>
                    </div>
                </div>
            @elseif(!auth()->user()->wallets()->where('slug','pets')->first())
                <div class="wallet-popup-wrapper" id="wallet-popup-wrapper">
                    <div class="wallet-popup-overlay"></div>
                    <div class="popup-content-wrap w-100 bg-light py-4 px-3 align-self-end d-flex justify-content-center">
                        <div class="popup-content d-flex flex-column justify-content-center align-items-center">
                            <h6 class="icon-heading text-dark mb-3 text-center">AI Suggestions</h6>
                            <h3 class="main-heading text-dark mb-4 text-center">Do you have a pet?</h3>
                            <a class="btn btn-primary mb-4" href="{{route('app.adduserwallet',['wallet'=>'pets'])}}">Yes - add new Wallet</a>
                            <a class="close-btn btn" id="wallet-ai-close">No, close window</a>
                        </div>
                    </div>
                </div>
            @endif
            <div class="modal fade" tabindex="-1" id="editwallet" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Wallet</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="walletcontent">
                            
                        </div>
                        
                    </div>
                </div>
            </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $('#wallet-ai-close').click(function(e){
                e.preventDefault();
                $('#wallet-popup-wrapper').remove();
            });
            const walletModal = document.getElementById('editwallet')
            if (walletModal) {
                walletModal.addEventListener('shown.bs.modal', event => {
                    const button = event.relatedTarget
                    const wallet = button.getAttribute('data-wallet')
                    const url = '/app/user/wallets/editwallet/'+wallet;
                    $.get(url,function(data){
                        const modalBody = walletModal.querySelector('.modal-body')
                        $(modalBody).html(data);
                    })
                })
                walletModal.addEventListener('hidden.bs.modal', event => {
                    const modalBody = walletModal.querySelector('.modal-body')
                    $(modalBody).empty();
                })
            }
            $(document).on('submit','#frmeditwallet',function(e){
            e.preventDefault();
            $('#frmeditwallet .alert.alert-danger').empty().hide();
            dt=$('#frmeditwallet').serialize();

            $.post($('#frmeditwallet').attr('action'),dt,function(data){
                if(data.error) 
                    $('#frmeditwallet .alert.alert-danger').html(data.msg).show()
                else
                    window.location='{{route('app.getuserwallets')}}';
            },'json')
        })

        });
    </script>
@endpush