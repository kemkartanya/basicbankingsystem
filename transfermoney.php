<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
</head>
<style type="text/css">
    body{
        background: #7fffd4;
    }
    .container{
        margin-left: 350px;
    }
    th, td {
        background: whitesmoke;
        border: 1px solid black;
        padding: 5px;
    }
</style>
<body>
<?php
    include 'config/db_connect.php';
    $sql = "SELECT * FROM customers";
    $result = mysqli_query($conn,$sql);
?>

<?php include 'templates/header.php' ?>
<div class="container">
    <h2>Transfer Money</h2>
    <br>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Balance</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <?php while($rows=mysqli_fetch_assoc($result)){ ?>
            <tr>
                <td><?php echo $rows['c_id'] ?></td>
                <td><?php echo $rows['name']?></td>
                <td><?php echo $rows['email']?></td>
                <td><?php echo $rows['curr_bal']?></td>
                <td><a href="customerdetails.php?id=<?php echo $rows['c_id']; ?>"> <button type="button">Show Details/Transfer</button></a></td> 
            </tr>
            <?php } ?>
        </tbody>
    </table>      
</div>
    <?php include 'templates/footer.php' ?>          
</body>
</html>