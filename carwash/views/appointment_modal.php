<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- In <head> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">



</head>
<body>
<!-- Modal HTML -->
<div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bookingModalLabel">Book Your Appointment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Booking Form -->
      <form id="appointmentForm" action="../page/save_appointment.php" method="POST">

  <p class="text-center">Fill out the form below to schedule your car wash service.</p>

  <!-- Optional: Hidden user_id (can be dynamically set with PHP if logged in) -->
  <input type="hidden" name="user_id" value="1">

  <div class="mb-3">
    <label for="fullName" class="form-label">Full Name:</label>
    <input type="text" class="form-control" id="fullName" name="full_name" required>
  </div>

  <div class="mb-3">
    <label for="services" class="form-label">Select Services:</label>
    <select class="form-control" id="services" name="service_id" required>
      <option value="">-- Select a service --</option>
      <option value="1">Exterior Wash</option>
      <option value="2">Interior Cleaning</option>
      <option value="3">Detailing</option>
      <option value="4">Express Wash</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="carType" class="form-label">Type of car:</label>
    <input type="text" class="form-control" id="carType" name="car_type" placeholder="e.g., SUV, Sedan" required>
  </div>

  <div class="mb-3">
    <label for="date" class="form-label">Preferred Date:</label>
    <input type="date" class="form-control" id="date" name="appointment_date" required>
  </div>

  <div class="mb-3">
    <label for="time" class="form-label">Preferred Time:</label>
    <input type="time" class="form-control" id="time" name="appointment_time" required>
  </div>

  <div class="text-center">
    <button type="submit" class="btn btn-primary">Confirm Appointment</button>
  </div>
</form>

        <!-- End Form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Before </body> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>