<?php
require_once '../../model/admin_db.php';
require_once '../../model/inventory.php';

$db = new database();          
$conn = $db->connect();             

$inventory = new Inventory($conn);  // instantiate the Inventory class
$items = $inventory->getAllItems(); // fetch items

// Handle Delete Item
if (isset($_GET['delete'])) {
    $idToDelete = (int) $_GET['delete'];
    if ($inventory->deleteItem($idToDelete)) {
        // Redirect to remove ?delete= from URL
        header("Location: inventory_management.php");
        exit();
    } else {
        echo "<script>alert('Failed to delete item.');</script>";
    }
    
}


// Handle Add Item
if (isset($_POST['add'])) {
    $name = $_POST['item_name'];
    $desc = $_POST['description'];
    $qty = $_POST['quantity'];
    $price = $_POST['unit_price'];

    // Handle image upload
    $imageName = $_FILES['image']['name'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $targetDir = "../../assets/uploads/";
    $targetFile = $targetDir . basename($imageName);

    if (move_uploaded_file($imageTmp, $targetFile)) {
        // Save to DB
        $inventory->addItem($name, $desc, $qty, $price, $imageName);
    } else {
        echo "<script>alert('Image upload failed.');</script>";
    }

    header("Location: inventory_management.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Inventory Management</title>
   
  <link rel="stylesheet" href="../../assets/css/admin_navbar.css" />
  <!-- Bootstrap & Font Awesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"/>

</head>

<body>

<div class="d-flex">
    <!-- Sidebar -->
  <div class="sidebar d-flex flex-column p-3">
<div class="text-center mb-4">
  <img src="../../assets/logo.png" alt="logo" class="sidebar-logo">
  <h4 class="mt-2">Admin Page</h4>
</div>
    <ul class="nav nav-pills flex-column mb-auto">
      <li>
        <a href="dashboard.php" class="nav-link">
          <i class="fa-solid fa-house"></i> Dashboard
        </a>
      </li>
 
      <!-- Booking Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="bookingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-calendar-check"></i> Bookings
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="./bookings/new_bookings.php">New Bookings</a></li>
          <li><a class="dropdown-item" href="./bookings/completed_bookings.php">Completed Bookings</a></li>
          <li><a class="dropdown-item" href="./bookings/all_bookings.php">All Bookings</a></li>
        </ul>
      </li>

      <li>
        <a href="inventory_management.php" class="nav-link active">
          <i class="fa-solid fa-folder-open"></i> Inventory Management
        </a>
      </li>
       
      <li>
        <a href="users.php" class="nav-link">
            <i class="fa-regular fa-user"></i> Users
       </a>
      </li> 
      <!-- Pages Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-file-lines"></i> Pages
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="./admin_pages/home.php">Home</a></li>
          <li><a class="dropdown-item" href="./admin_pages/services.php">Services</a></li>
           <li><a class="dropdown-item" href="./admin_pages/contact.php">Contact</a></li>
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
    <h2 class="mb-4">Inventory Management</h2>

    <!-- Add Item Form -->
    <form method="POST" enctype="multipart/form-data" class="row g-3 mb-4">
    <div class="col-md-2">
        <input type="file" name="image" class="form-control" accept="image/*" required>
    </div>
    <div class="col-md-2">
        <input type="text" name="item_name" class="form-control" placeholder="Item Name" required>
    </div>
    <div class="col-md-2">
        <input type="text" name="description" class="form-control" placeholder="Description" required>
    </div>
    <div class="col-md-2">
        <input type="number" name="quantity" class="form-control" placeholder="Quantity" required>
    </div>
    <div class="col-md-2">
        <input type="number" step="0.01" name="unit_price" class="form-control" placeholder="Unit Price" required>
    </div>
    <div class="col-md-2">
        <button type="submit" name="add" class="btn btn-primary w-100">Add Item</button>
    </div>
</form>


    <!-- Inventory Table -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Item Name</th>
            <th>Image</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Date Added</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?= $item['inventory_id'] ?></td>
                <td><?= htmlspecialchars($item['item_name']) ?></td>
                <td><img src="../../assets/uploads/<?= htmlspecialchars($item['item_img']) ?>" width="100" height="100" alt="Image"></td>
                <td><?= htmlspecialchars($item['description']) ?></td>
                <td><?= $item['quantity'] ?></td>
                <td><?= number_format($item['unit_price'], 2) ?></td>
                <td><?= $item['date_added'] ?></td>
                <td>
                    <a href="?delete=<?= $item['inventory_id'] ?>" class="btn btn-sm btn-danger"
                       onclick="return confirm('Delete this item?');"><i class="fa fa-trash"></i>Delete</a> 
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
