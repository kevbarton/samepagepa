// $(document).ready(function () {
//     $('.upload-btn input[type="file"]').on('change', function () {
//         var fileName = $(this).val().split('\\').pop(); // Get the file name
//         var fileExtension = fileName.split('.').pop().toLowerCase(); // Get the file extension

//         // Allowed file extensions
//         var allowedExtensions = ['png', 'jpg', 'jpeg'];

//         if ($.inArray(fileExtension, allowedExtensions) === -1) {
//             // File extension is not allowed
//             alert('Please upload PNG or JPG files only.');
//             $(this).val(''); // Clear the file input
//             $(this).siblings('.file-name').text('');
//         } else {
//             $(this).siblings('.file-name').text(fileName);
//         }
//     });
// });

$(document).ready(function () {
    //  Code for Home Expand and Collapse
	var maxHeight = 0;
	$('.collapsed-data .collapsed-cards').each(function (index, card) {
    if(!$(card).hasClass('task-card')){
      var scaleValue = 1 - (index * 0.02);
      $(card).css('z-index', 100-(index + 1));
      $(card).css('transform', 'scale(' + scaleValue + ')');
    }
		var cardHeight = $(card).outerHeight();
		if (cardHeight > maxHeight) {
			maxHeight = cardHeight;
		}
	});
	$('.collapsed-data .collapsed-cards').css('height', maxHeight + 'px');
	$('.collapsed-data .collapsed-cards:not(:first-child)').css('margin-top', -maxHeight + 'px');
	// $('.toggle-btn').click(function () {
	// 	$('.collapsed-data').toggleClass('active');
	// 	var buttonText = $('.collapsed-data').hasClass('active') ? 'Collapse' : 'Expand';
	// 	$(this).text(buttonText);
	// });
	// Check if .collapsed-data is initially active
	var initialActive = $('.collapsed-data').hasClass('active');
	$('.toggle-btn').text(initialActive ? 'Collapse' : 'Expand');
	
	// Toggle functionality
	$('.toggle-btn').click(function () {
		$('.collapsed-data').toggleClass('active');
		$(this).text(function (i, text) {
			return text === 'Collapse' ? 'Expand' : 'Collapse';
		});
	});
  
    // Code for Home Page dropDown Toggle
    $('.dropdown-button').on('click', function() {
      $(this).toggleClass('active');
      $('.dropdown-details-wrapper').slideToggle();
    })

  $('.upload-btn input[type="file"]').on('change', function () {
    var fileName = $(this).prop('files')[0].name;
    $(this).siblings('.file-name').text(fileName);
  });


  // Image preview function
  function readURL(input) {
    if (input.files && input.files[0]) {
      var fileType = input.files[0].type;
      // Check if the selected file is an image
      if (fileType && fileType.startsWith('image/')) {
        var reader = new FileReader();

        reader.onload = function (e) {
          var img = $('<img />', { src: e.target.result, alt: '' }); // Create an image tag
          $('.image-preview').empty().append(img); // Empty the container and append the image tag
          $('label[for="certificate"]').addClass('image-selected'); // Add the class when an image is selected
        };

        reader.readAsDataURL(input.files[0]); // Read the image file as a data URL.
      } else {
        // If the selected file is not an image, alert the user or handle accordingly
        alert('Please select an image file.');
        // Clear the input value to reset selection
        $('#certificate').val('');
        $('.image-preview').empty(); // Remove any previous preview
        $('label[for="certificate"]').removeClass('image-selected'); // Remove the class
      }
    }
  }

  // Trigger the function on file input change
  $("#certificate").change(function () {
    readURL(this);
  });

});


// starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
