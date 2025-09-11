<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <!-- booking_modal.php -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bookingModalLabel">My Booking Progress</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="bookingContent">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Service</th>
                <th>Car Type</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody id="bookingTableBody">
              <!-- Booking data will be inserted here -->
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('#bookingModal').on('show.bs.modal', function () {
  $.ajax({
    url: '../page/fetch_bookings.php',
    method: 'POST',
    data: { user_id: 1 }, // Replace with PHP session later
    success: function(response) {
      $('#bookingTableBody').html(response);
    },
    error: function() {
      $('#bookingTableBody').html('<tr><td colspan="5">Error loading bookings.</td></tr>');
    }
  });
});
</script>


</body>
</html>