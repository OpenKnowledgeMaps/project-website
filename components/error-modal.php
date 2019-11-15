<link rel="stylesheet" href="./css/error-modal.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<!-- Trigger/Open The Modal -->
<button id="error_info_button">Try a different search term (more info)</button>

<!-- The Modal -->
<div id="error_modal" class="modal">
   <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <h2>Modal Header</h2>
    </div>
    <div class="modal-body">
      <p>Default error text</p>
    </div>
    <div class="modal-footer">
      <h3>Modal Footer</h3>
        <span id="error_modal_close" class="close">&times;</span>
    </div>
  </div>
</div>

<script type="text/javascript">
  var error_type = localStorage.getItem("error_type");
  // Get the modal
  var modal = document.getElementById("error_modal");

  // Get the button that opens the modal
  var btn = document.getElementById("error_info_button");

  // Get the <span> element that closes the modal
  var span = document.getElementById("error_modal_close");

  $(function() {
    var modal = $('#error_modal');
    btn.style.visibility="hidden";
    if ( error_type == 1) {
      modal.find('.modal-body p').text('Error type 1 detected.');
      btn.style.visibility="visible";
    }
    if ( error_type == 2) {
      modal.find('.modal-body p').text('Error type 2 detected.');
      btn.style.visibility="visible";
    }
    if ( error_type == 3) {
      modal.find('.modal-body p').text('Error type 3 detected.');
      btn.style.visibility="visible";
    }
    if ( error_type == 4) {
      modal.find('.modal-body p').text('Error type 4 detected.');
      btn.style.visibility="visible";
    }
  });
  // When the user clicks on the button, open the modal
  btn.onclick = function() {
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
