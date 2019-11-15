<link rel="stylesheet" href="./css/error-modal.css">

<!-- The Modal -->
<div id="error_modal" class="modal">
   <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-body">
      <p>Sorry! We could not create a map for <span class="error-modal-q"></span>.</p>
    </div>
    <div class"error-message-body">
      <p>Default error text</p>
    </div>
    <span id="error_modal_close" class="close">Try again</span>
    </div>
  </div>
</div>

<script type="text/javascript">
  var error_type = localStorage.getItem("error_type");
  var q = localStorage.getItem("q");
  // Get the modal
  var modal = document.getElementById("error_modal");

  // Get the button that opens the modal
  var modal_btn = document.getElementById("error_info_button");

  // Get the <span> element that closes the modal
  var span = document.getElementById("error_modal_close");


  $(function() {
    var modal = $('#error_modal');
    modal.find('.error-modal-q').text(q);
    modal_btn.style.visibility="hidden";
    if ( error_type == "typo") {
      modal.find('.error-message-body p').text('Error type TYPO detected.');
      modal_btn.style.visibility="visible";
    }
    if ( error_type == 2) {
      modal.find('.error-message-body p').text('Error type 2 detected.');
      modal_btn.style.visibility="visible";
    }
    if ( error_type == 3) {
      modal.find('.error-message-body p').text('Error type 3 detected.');
      modal_btn.style.visibility="visible";
    }
    if ( error_type == 4) {
      modal.find('.error-message-body p').text('Error type 4 detected.');
      modal_btn.style.visibility="visible";
    }
  });
  // When the user clicks on the button, open the modal
  modal_btn.onclick = function() {
    modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>
