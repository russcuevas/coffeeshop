<?php
include 'config/connection.php';
$stmt = $conn->query("SELECT * FROM coffee");
$coffees = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['remove_all'])) {
  $stmt = $conn->prepare("DELETE FROM coffee");
  $stmt->execute();
  header('location: shop.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Coffee & Drinks Shop!</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="logo">
        <img src="images/cofee-logo.png" alt="Coffee Logo" style="width: 150px; height: 100px;">
        <img src="images/user-icon.png" alt="User Icon" class="user-icon">
        <span style="margin-left: 10px; margin-right: 70px; font-size: 20px; font-weight: 900; color:#3C2A21;">Hello Welcome!</span>
    </div>
	<h1 style="text-align: center; color: #3C2A21; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">AJ's Coffee Shop</h1>
	<div class="container">
		<div class="col">
			<h2 style="text-align: center; border: 2px solid #3C2A21; border-radius: 50px; background-color: #3C2A21; color: white;">Add First Coffee</h2>
      <table>
      <thead>
    <!-- <tr>
        <th>Coffee Product</th>
    </tr> -->
</thead>
<form action="add_coffee.php" method="POST">
    <table>
        <tbody>
            <tr>
                <td class="p-3">Add Coffee:</td>
                <td><input type="text" class="form-control" style="border: 2px solid #3C2A21;" name="coffee_name"></td>
            </tr>
            <tr>
                <td class="p-3">Add Expiration Date:</td>
                <td><input type="date" class="form-control" style="border: 2px solid #3C2A21;" name="coffee_expired"></td>
            </tr>
            <tr>
                <td class="p-3">Add Price:</td>
                <td><input type="text" class="form-control" style="border: 2px solid #3C2A21;" name="coffee_price"></td>
            </tr>
            <tr>
                <td style="border: none;"><input class="btn btn-success" type="submit" name="submit" value="Add"></td>
            </tr>
        </tbody>
    </table>
</form>


		</div>
		<div class="col">
			<h2 style="text-align: center; border: 2px solid #3C2A21; border-radius: 50px; background-color: #3C2A21; color: white;">Coffee</h2>
			<table>
                <table>
                    <thead>
                        <tr>
                          <th>Coffee ID</th>
                          <th>Coffee Name</th>
                          <th>Expiration Date</th>
                          <th>Price</th>
                          <!-- <th>Actions</th> -->
                        </tr>
                      </thead>
                        <?php foreach ($coffees as $coffee): ?>
                        <tr>
                        <td><?php echo $coffee['id']; ?></td>
                        <td><?php echo $coffee['coffee_name']; ?></td>
                        <td><?php echo $coffee['coffee_expired']; ?></td>
                        <td>₱<?php echo $coffee['coffee_price']; ?></td>
                        <!-- <td>
                            <a style="color:#3C2A21" href="#"><i class="fas fa-eye"></i></a>
                            <a style="color:#3C2A21" href="#"><i class="fas fa-edit"></i></a>
                            <a style="color:#3C2A21" href="#"><i class="fas fa-trash"></i></a>
                        </td> -->
                          </tr>
                          <?php endforeach; ?>
                    </tbody>
              </table>
              <td style="border: none;"><a class="btn btn-danger mt-4 float-end" href="shop.php?remove_all=true" onclick="return confirm('Are you sure you want to remove all this coffee data')">Remove All</a></td>
		    </div>
	    </div>
    </body>
</html>