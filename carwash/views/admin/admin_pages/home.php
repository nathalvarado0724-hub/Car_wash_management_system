<?php
// DB Connection
$conn = new mysqli("localhost", "root", "", "cwms_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

require_once '../../../model/service_admin.php';
$serviceObj = new Service($conn);

$error = "";
$success = "";

// Handle POST for update or insert
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'update' && isset($_POST['service_id'])) {
        $updated = $serviceObj->updateService(
            $_POST['service_id'],
            $_POST['title'],
            $_POST['description'],
            $_POST['price'],
            $_POST['img_url']
        );
        if ($updated) {
            $success = "Service updated successfully.";
        } else {
            $error = "Failed to update service.";
        }
    } elseif (isset($_POST['action']) && $_POST['action'] === 'add') {
        // Add new service function should be added in Service class
        if (method_exists($serviceObj, 'addService')) {
            $added = $serviceObj->addService(
                $_POST['title'],
                $_POST['description'],
                $_POST['price'],
                $_POST['img_url']
            );
            if ($added) {
                $success = "Service added successfully.";
            } else {
                $error = "Failed to add service.";
            }
        } else {
            $error = "Add service method not implemented.";
        }
    }
    elseif (isset($_POST['action']) && $_POST['action'] === 'delete' && isset($_POST['service_id'])) {
    $deleted = $serviceObj->deleteService($_POST['service_id']);
    if ($deleted) {
        $success = "Service deleted successfully.";
    } else {
        $error = "Failed to delete service.";
    }
}

}

// Fetch services
$services = $serviceObj->getAllServices();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Home</title>
     
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
      <li>
        <a href="../dashboard.php" class="nav-link ">
          <i class="fa-solid fa-house"></i> Dashboard
        </a>
      </li>
 
      <!-- Booking Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="bookingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-calendar-check"></i> Bookings
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="../bookings/new_bookings.php">New Bookings</a></li>
          <li><a class="dropdown-item" href="../bookings/completed_bookings.php">Completed Bookings</a></li>
          <li><a class="dropdown-item" href="../bookings/all_bookings.php">All Bookings</a></li>
        </ul>
      </li>

      <li>
        <a href="../inventory_management.php" class="nav-link">
          <i class="fa-solid fa-folder-open"></i> Inventory Management
        </a>
      </li>

      <li>
        <a href="../users.php" class="nav-link">
            <i class="fa-regular fa-user"></i> Users
       </a>
      </li>  
      <!-- Pages Dropdown -->
      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle active" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-file-lines"></i> Pages
        </a>
        <ul class="dropdown-menu">
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

</div>
<div class="container mt-5">
  <h2>Manage Services</h2>

  <?php if ($error): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
  <?php elseif ($success): ?>
    <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
  <?php endif; ?>

  <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
    <i class="fa fa-plus"></i> Add New Service
  </button>

  <table class="table table-bordered table-striped align-middle">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
      
        <th>Image</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($services->num_rows > 0): ?>
        <?php while($row = $services->fetch_assoc()): ?>
          <tr>
            <td><?= $row['service_id'] ?></td>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars($row['description']) ?></td>
            <td>
              <?php if ($row['img_url']): ?>
                <img src="<?= htmlspecialchars($row['img_url']) ?>" alt="Img" style="max-height:50px;"/>
              <?php else: ?>
                No Image
              <?php endif; ?>
            </td>
           <td>
  <!-- Edit button -->
  <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal"
    onclick='editService(<?= json_encode($row) ?>)'>
    <i class="fa fa-edit"></i> Edit
  </button>

<form method="POST" action="" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this service?');">
  <input type="hidden" name="action" value="delete" />
  <input type="hidden" name="service_id" value="<?= $row['service_id'] ?>" />
  <button type="submit" class="btn btn-sm btn-outline-danger">
    <i class="fa fa-trash"></i> Delete
  </button>
</form>

</td>

          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr>
          <td colspan="5" class="text-center">No services found.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form method="POST" action="">
      <input type="hidden" name="action" value="update" />
      <input type="hidden" name="service_id" id="editServiceId" />
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Service</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="editTitle" class="form-label">Title</label>
            <input type="text" class="form-control" id="editTitle" name="title" required />
          </div>
          <div class="mb-3">
            <label for="editDescription" class="form-label">Description</label>
            <textarea class="form-control" id="editDescription" name="description" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label for="editImgUrl" class="form-label">Image URL</label>
            <input type="text" class="form-control" id="editImgUrl" name="img_url" />
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save Changes</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form method="POST" action="">
      <input type="hidden" name="action" value="add" />
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Service</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="addTitle" class="form-label">Title</label>
            <input type="text" class="form-control" id="addTitle" name="title" required />
          </div>
          <div class="mb-3">
            <label for="addDescription" class="form-label">Description</label>
            <textarea class="form-control" id="addDescription" name="description" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label for="addImgUrl" class="form-label">Image URL</label>
            <input type="text" class="form-control" id="addImgUrl" name="img_url" />
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Add Service</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
function editService(service) {
  document.getElementById('editServiceId').value = service.service_id;
  document.getElementById('editTitle').value = service.title;
  document.getElementById('editDescription').value = service.description;

  document.getElementById('editImgUrl').value = service.img_url;
}
</script>

</body>
</html>
