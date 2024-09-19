@extends('layouts.app')
@section('pageTitle','Samepage')
@section('bodyClass','bg-dark')
@section('mainClass','page-wrapper')
@section('containerClass','container pb-100 pt-4')
@section('content')
<div class="progress-bars-wrapper three-bars">
    <span class="bar fill"></span>
    <span class="bar fill"></span>
</div>

<div class="page-title mt-4">
    <h1 class="text-primary h4 text-center mb-0 px-4 page-title">Upload a photo</h1>
    <a href="{{route('appusergetstarted.profile')}}" class="btn-close btn-close-white btn-nav-small" aria-label="Close"></a>
</div>

<form class="dark-form mt-5" method="post" id="photoupload">
@csrf

    <div class="flex-grow-1 justify-content-center align-items-center d-flex flex-column">

        <div class="mb-3 upload-btn large">
            <input type="file" class="form-control upload" id="img" >
            <label for="img" class="form-label mb-0">
                <div class="image-preview">
                    @if($user->getFirstMediaUrl('avatar'))
                        <img src="{{$user->getFirstMediaUrl('avatar','thumb')}}" alt="" id="avatar"/>
                    @endif
                </div>
            </label>


        </div>

        <div class="text-center">
            <label for="certificate" class="form-label">Upload profile photo</label>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
        </div>
        <div class="alert" role="alert"></div>
    </div>

    <div class="form-footer text-center">
        <a href="{{route('appusergetstarted.familymembers')}}" class="btn btn-primary">Next</a>
    </div>
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Crop the image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="crop">Crop</button>
            </div>
            </div>
        </div>
    </div>
</form>
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('app-assets/css/cropper.css')}}">
@endpush
@push('scripts')
<script src="{{asset('app-assets/js/cropper.js')}}"></script>
<script>
    window.addEventListener('DOMContentLoaded', function () {
      var avatar = document.getElementById('avatar');
      var image = document.getElementById('image');
      var input = document.getElementById('img');
      var $progress = $('.progress');
      var $progressBar = $('.progress-bar');
      var $alert = $('.alert');
      var $modal = $('#modal');
      var cropper;

      $('[data-toggle="tooltip"]').tooltip();

      input.addEventListener('change', function (e) {
        var files = e.target.files;
        var done = function (url) {
          input.value = '';
          image.src = url;
          $alert.hide();
          $modal.modal('show');
        };
        var reader;
        var file;
        var url;

        if (files && files.length > 0) {
          file = files[0];

          if (URL) {
            done(URL.createObjectURL(file));
          } else if (FileReader) {
            reader = new FileReader();
            reader.onload = function (e) {
              done(reader.result);
            };
            reader.readAsDataURL(file);
          }
        }
      });

      $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
          aspectRatio: 1,
          viewMode: 3,
        });
      }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
      });

      document.getElementById('crop').addEventListener('click', function () {
        var initialAvatarURL;
        var canvas;

        $modal.modal('hide');

        if (cropper) {
          canvas = cropper.getCroppedCanvas({
            width: 160,
            height: 160,
          });
          initialAvatarURL = avatar.src;
          avatar.src = canvas.toDataURL();
          $progress.show();
          $alert.removeClass('alert-success alert-warning');
          canvas.toBlob(function (blob) {
            var formData = new FormData();

            formData.append('avatar', blob, 'avatar-{{auth()->user()->id}}.jpg');
            formData.append('_token', $('input[name="_token"]').val());
            $.ajax('{{route('appusergetstarted.addfamilymemberphotoupload',['user'=>$user->id])}}', {
              method: 'POST',
              data: formData,
              processData: false,
              contentType: false,

              xhr: function () {
                var xhr = new XMLHttpRequest();

                xhr.upload.onprogress = function (e) {
                  var percent = '0';
                  var percentage = '0%';

                  if (e.lengthComputable) {
                    percent = Math.round((e.loaded / e.total) * 100);
                    percentage = percent + '%';
                    $progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
                  }
                };

                return xhr;
              },

              success: function () {
                $alert.show().addClass('alert-success').text('Upload success');
              },

              error: function () {
                avatar.src = initialAvatarURL;
                $alert.show().addClass('alert-warning').text('Upload error');
              },

              complete: function () {
                $progress.hide();
              },
            });
          });
        }
      });
    });
  </script>
@endpush
