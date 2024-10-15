<?php
include 'db.php'; // Include your database connection file
    if(isset($_POST['save'])){
        $Itemname = htmlspecialchars($_POST['item_name']);
        $Status = htmlspecialchars($_POST['status']);
        $Date = htmlspecialchars($_POST['returned_date']);

        $sql = "INSERT INTO additem (`item`,  `status`, `date`)VALUES('$Itemname',  '$Status', '$Date')";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo "Successfully Added";
            header("location: tracker.php");
        }
        else{
            echo "Failed to Add";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Record Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0; /* Remove default margin */
            display: flex; /* Use flexbox for layout */
        }

        /* Sidebar style */
        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #333;
            padding-top: 20px;
            position: fixed; /* Keep sidebar fixed */
        }

        .sidebar a {
            padding: 15px 20px; /* Increased padding for better touch targets */
            text-decoration: none;
            font-size: 16px; /* Set font size for the sidebar links */
            color: white;
            display: flex; /* Use flexbox for horizontal alignment */
            align-items: center; /* Center items vertically */
            transition: background-color 0.3s; /* Smooth transition for hover */
        }

        .sidebar a:hover {
            background-color: #575757; /* Change background color on hover */
        }

        .sidebar a i {
            margin-right: 10px; /* Space between icon and text */
        }

        /* Main content */
        .main-content {
            margin-left: 260px; /* Adjust for sidebar width */
            padding: 20px;
            flex-grow: 1; /* Take remaining space */
        }

        .container {
            margin-top: ;
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"], input[type="date"], select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .submit-btn {
            background-color: #5cb85c;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .submit-btn:hover {
            background-color: #4cae4c; /* Change background color on hover */
        }

        .message {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="User Profile.php"><i class="fa-solid fa-cog"></i> User Profile</a>
        <a href="dashboard.php"><i class="fa-solid fa-tachometer-alt"></i> Dashboard</a>
        <a href="inventory.php"><i class="fa-solid fa-warehouse"></i> Inventory</a>
        <a href="nrecord.php"><i class="fa-solid fa-file-alt"></i> New Record</a>
        <a href="stocks.php"><i class="fa-solid fa-boxes"></i> Stocks</a>    
        <a href="tracker.php"><i class="fa-solid fa-map-marker-alt"></i> Tracker</a>
        <a href="return.php"><i class="fa-solid fa-undo-alt"></i> Return Record</a>
    </div>
    
    <!-- Main content -->
    <div class="main-content">
        <div class="container">
            <h1>New Record</h1>
            <form  method="POST">
            <label for="status">Item Name:</label>
                <select id="status" name="status" required>
                    <option value="Item Returned">Items</option>
                    <option value="Excavators">Excavators</option>
                    <option value="Backhoe">Backhoe</option>
                    <option value="Bulldozers">Bulldozers</option>
                    <option value="Wheel Tractor Scraper">Wheel Tractor Scraper</option>
                    <option value="Dump Trucks"> Dump Trucks</option>
                    <option value="Telehandlers">Telehandlers</option>
                </select>

                

                <label for="status">Status:</label>
                <select id="status" name="status" required>
                    <option value="Item Returned">Item Returned</option>
                    <option value="Pending">Pending</option>
                    <option value="Lost">Lost</option>
                    
                </select>

                <label for="returned_date">Returned Date:</label>
                <input type="date" id="returned_date" name="returned_date" required>

                <button type="submit" class="submit-btn" name="save">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>