<?php
session_start();
require_once '../../../page/MessageManager.php'; // adjust path if needed

$msgManager = new MessageManager();

// Handle deletion if `?delete_id=...` is set in URL
if (isset($_GET['delete_id'])) {
    $deleted = $msgManager->deleteMessage($_GET['delete_id']);
    if ($deleted) {
        header("Location: contact.php"); // reload without delete param
        exit();
    } else {
        echo "<script>alert('Failed to delete message');</script>";
    }
}

$messages = $msgManager->getMessages();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Contact</title>
  
  <link rel="stylesheet" href="../../../assets/css/admin_navbar.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"/>
</head>

<body>
<div class="d-flex">
  <!-- Sidebar -->
  <div class="sidebar d-flex flex-column p-3">
    <div class="text-center mb-4">
      <img src="../../../assets/logo.png" alt="logo" class="sidebar-logo">
      <h4 class="mt-2">Admin Page</h4>
    </div>
    <ul class="nav nav-pills flex-column mb-auto">
      <li><a href="../dashboard.php" class="nav-link"><i class="fa-solid fa-house"></i> Dashboard</a></li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="bookingDropdown" role="button" data-bs-toggle="dropdown">
          <i class="fa-solid fa-calendar-check"></i> Bookings
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="../bookings/new_bookings.php">New Bookings</a></li>
          <li><a class="dropdown-item" href="../bookings/completed_bookings.php">Completed Bookings</a></li>
          <li><a class="dropdown-item" href="../bookings/all_bookings.php">All Bookings</a></li>
        </ul>
      </li>

      <li><a href="../inventory_management.php" class="nav-link"><i class="fa-solid fa-folder-open"></i> Inventory Management</a></li>
      <li><a href="../users.php" class="nav-link"><i class="fa-regular fa-user"></i> Users</a></li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown">
          <i class="fa-solid fa-file-lines"></i> Pages
        </a>
        <ul class="dropdown-menu active">
          <li><a class="dropdown-item" href="./home.php">Home</a></li>
          <li><a class="dropdown-item" href="./services.php">Services</a></li>
          <li><a class="dropdown-item" href="./contact.php">Contact</a></li>
        </ul>
      </li>

      <li>
        <a href="logout.php" class="nav-link text-danger" onclick="return confirm('Are you sure you want to logout?');">
          <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
      </li>
    </ul>
  </div>

  <!-- Main Content -->
  <div class="container mt-4">
    <h2 class="mb-4">Inquiry / Message</h2>
    <div class="row">
      <div class="col-md-7">
        <table class="table table-bordered table-striped">
          <thead class="table-dark">
            <tr>
              <th>No.</th>
              <th>Subject</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($messages)): ?>
              <?php foreach ($messages as $index => $msg): ?>
                <tr>
                  <td><?= $index + 1 ?></td>
                  <td><?= htmlspecialchars($msg['subject']) ?></td>
                  <td><?= date("F d, Y h:i:s A", strtotime($msg['submitted_at'])) ?></td>
                  <td>
                    <button class="btn btn-sm btn-outline-dark" 
                            onclick='showMessage(<?= htmlspecialchars(json_encode($msg), ENT_QUOTES, "UTF-8") ?>)'>
                      <i class="fa fa-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-warning" 
                            onclick="confirmDelete(<?= $msg['message_id'] ?>)">
                        <i class="fa fa-trash"></i>
                    </button>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr><td colspan="4" class="text-center">No inquiries found.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <!-- Message Details Card -->
      <div class="col-md-5">
        <div class="card" id="messageCard" style="display: none;">
          <div class="card-body">
            <h5 class="card-title" id="msgName">From:</h5>
            <p id="msgText" class="card-text"></p>
            <p><strong>Email:</strong> <span id="msgEmail"></span></p>
            <p><strong>Contact No.:</strong> <span id="msgContact"></span></p>
            <p><strong>Date:</strong> <span id="msgDate"></span></p>
            <p><strong>Rating:</strong> <span id="msgRating"></span></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript -->
<script>
function showMessage(data) {
  document.getElementById('msgName').innerText = "From: " + data.subject;
  document.getElementById('msgText').innerText = data.message;
  document.getElementById('msgEmail').innerText = data.email;
  document.getElementById('msgContact').innerText = data.contact_number;
  document.getElementById('msgDate').innerText = new Date(data.submitted_at).toLocaleString();

  // Rating stars
  let stars = "";
  const rating = parseInt(data.rating);
  for (let i = 1; i <= 5; i++) {
    stars += i <= rating
      ? '<i class="fa-solid fa-star text-warning"></i>'
      : '<i class="fa-regular fa-star text-muted"></i>';
  }
  document.getElementById('msgRating').innerHTML = stars;

  document.getElementById('messageCard').style.display = "block";
}


function confirmDelete(id) {
  if (confirm("Are you sure you want to delete this message?")) {
    window.location.href = "contact.php?delete_id=" + id;
  }
}
</script>

</body>
</html>
