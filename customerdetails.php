<?php
include 'config/db_connect.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customers where c_id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from customers where c_id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';
        echo '</script>';
    }


  
    
    else if($amount > $sql1['curr_bal']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")'; 
        echo '</script>';
    }
    


   
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                
                $newbalance = $sql1['curr_bal'] - $amount;
                $sql = "UPDATE customers set curr_bal=$newbalance where c_id=$from";
                mysqli_query($conn,$sql);
             

                
                $newbalance = $sql2['curr_bal'] + $amount;
                $sql = "UPDATE customers set curr_bal=$newbalance where c_id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transactions(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){

                     echo "<script type='text/javascript'>
                            alert('Transaction Successful');
                            window.location = 'transfermoney.php';
                        </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    
    <style type="text/css">
        .submit{
            margin-left: 50px;
            height: 30px;
            width: 130px;
        }
        .container{
            margin: 80px;
        }
    	th, td {
            padding: 5px;
        }
		button{
			border:none;
			background: #d9d9d9;
		}
	    button:hover{
			background-color:#777E8B;
			transform: scale(1.1);
			color:white;
		}
        .all{
            display: flex;
        }
    </style>
</head>
<?php
    include 'templates/header.php' 
?>
<body style="background: #f5f5dc;">
    <div class="all">
	<div class="container">
        <h2>Transaction</h2>
            <?php
                include 'config/db_connect.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  customers where c_id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" ><br>
        <div>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Balance</th>
                </tr>
                <tr>
                    <td><?php echo $rows['c_id'] ?></td>
                    <td><?php echo $rows['name'] ?></td>
                    <td><?php echo $rows['email'] ?></td>
                    <td><?php echo $rows['curr_bal'] ?></td>
                </tr>
            </table>
        </div>
        <br><br><br>
        <label>Transfer To:</label>
        <select name="to" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'config/db_connect.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM customers where c_id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?php echo $rows['c_id'];?>" >
                
                    <?php echo $rows['name'] ;?> (Balance: 
                    <?php echo $rows['curr_bal'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br><br>
            <label>Amount:</label>
            <input type="number" name="amount" required>   
            <br><br>
                <div>
            <button name="submit" type="submit" class="submit">Transfer</button>
            </div>
        </form>
    </div>
    <img src="images/pay.png" width="200" height="200" style="margin: 150px;">
</div>
    <?php include 'templates/footer.php' ?>
</body>
</html>