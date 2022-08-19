<?php
class shopping
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "shopping_cart";
    private $connect;

    public function __construct()
    {
        $this->connect = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if ($this->connect->connect_error) {
            echo "Connection Failed";
        } else {
            return $this->connect;
        }
    }


    //Fucntion For login and signup
    public function signup()
    {
        $fname = $this->connect->real_escape_string($_POST['fullname']);
        $pass = $this->connect->real_escape_string($_POST['password']);
        $email = $this->connect->real_escape_string($_POST['email']);
        $query = "insert into signup(fullname, email, password) values('$fname','$email','$pass')";
        $result = $this->connect->query($query);
        if ($result == true) {
            header("Location:signup.php");
        } else {
            echo "There is an error in the code";
        }
    }
    public function login()
    {
        $user = $this->connect->real_escape_string($_POST['username']);
        $pass = $this->connect->real_escape_string($_POST['loginpass']);
        $query = "select * from signup where email = '$user' and password= '$pass'";
        $result = $this->connect->query($query);
        $r = $result->fetch_assoc();
        if ($result->num_rows > 0) {
            $_SESSION['username'] = $r['fullname'];
            $_SESSION['userid'] = $r['id'];
            header("location:index.php");
        } else {
            echo "Login Failed";
        }
    }

    public function categoryDisplay()
    {
        $query = "select * from categories";
        $result = $this->connect->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "There is an error in the code";
        }
    }

    public function contactUs()
    {
        $name = $this->connect->real_escape_string($_POST['name']);
        $email = $this->connect->real_escape_string($_POST['email']);
        $message = $this->connect->real_escape_string($_POST['message']);
        $query = "insert into contactus(fullname, email, message) values('$name', '$email', '$message')";
        $result = $this->connect->query($query);
        if ($result == true) {
            header("Location:contactUs.php");
        } else {
            echo "There is an error in the code";
        }
    }


    public function productDisplay()
    {
        $query = "select * from product";
        $result = $this->connect->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "There is an error in the code";
        }
    }


    public function getProduct($id)
    {
        $query = "select * from product where categoryid = $id";
        $result = $this->connect->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            $p = "No Product Found";
            $data[] = $p;
            return $data;
        }
    }


    public function cartProduct($id)
    {
        $query = "select * from product where id = $id";
        $result = $this->connect->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            $p = "No Product Found";
            $data[] = $p;
            return $data;
        }
    }


    public function addToCart($pid, $uid)
    {
        $quantity = $this->connect->real_escape_string($_REQUEST['qty']);
        $query = "insert into cart (userid, productid, quantity) values($uid, $pid, $quantity)";
        $result = $this->connect->query($query);
        if ($result == true) {
?>
            <script>
                alert("Record Inserted");
            </script>
<?php
        } else {
            echo "There is an error in the code";
        }
    }


    public function checkoutDisplay()
    {
        $query = "select * from cart";
        $result = $this->connect->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "There is an error in the code";
        }
    }
}
