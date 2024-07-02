# First-task-in-web-path-

the goal:
Create a web interface to control the direction of movement of a robot using buttons that can be pressed to send commands to a database, and then these commands are processed by a PHP file.

Steps and ingredients:
1.Create the project structure:
- We created a new folder inside XAMPP's `htdocs` folder and named it `robot`.
- Inside this folder, we created `index.html` and `cntrol.php` files.

2.`index.html` file:
- This file represents the user interface that contains the buttons to control the robot's movement.
We used HTML to create the page structure, and CSS to format the external appearance of the buttons so that they are arranged in a circular manner.
- The buttons are placed in their appropriate positions: forward, back, right, left, and center (stop).

- code ( `index.html` )
________________________________________________________________________________________________vvvvvv
- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Robot Control</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
        }
        .control-panel {
            position: relative;
            width: 300px;
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 50%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .control-panel button {
            position: absolute;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 1px solid #ccc;
            background-color: #e0e0e0;
            font-size: 16px;
            cursor: pointer;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .control-panel .forward {
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
        }
        .control-panel .backward {
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
        }
        .control-panel .left {
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
        }
        .control-panel .right {
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }
        .control-panel .stop {
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100px;
            height: 100px;
            background-color: #f00;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="control-panel">
        <form action="cntrol.php" method="POST">
            <button name="dir" type="submit" name="command" value="forward" class="forward">Forward</button>
            <button name="dir" type="submit" name="command" value="backward" class="backward">Backward</button>
            <button name="dir" type="submit" name="command" value="left" class="left">Left</button>
            <button name="dir" type="submit" name="command" value="right" class="right">Right</button>
            <button name="dir" type="submit" name="command" value="stop" class="stop">Stop</button>
        </form>
    </div>
</body>
</html>

_______________________________________________________________________________________________^^^^^^

Explanation of `index.html`:
- The `<head>` element contains information such as the page title and style links (CSS).
- The `<body>` element contains the main content of the page, including the buttons.

-CSS:
- CSS is used to format the page, including centralizing the buttons within the circle and placing them in the appropriate positions.

- HTML form (Form):
- It contains buttons whose values ​​are sent when pressed.
- When a button is pressed, a POST request is sent to `cntrol.php` with the appropriate value (eg "forward", "backward", etc.).

3. `cntrol.php` file:
- This file receives commands from `index.html` and inserts them into the MySQL database.

- _______________________________________________________________________________vvvvvv

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "robobt_controler";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['dir'])) {
    $command = $_POST['dir'];
    $sql = "INSERT INTO robot_1 (Distense) VALUES ('$command')";
    if ($conn->query($sql) === TRUE) {
        echo "Robot now is  '$command' successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

____________________________________________________________________________________^^^^^^


Explanation of `control.php`:
- Connect to the database:
- A connection to the MySQL database is established using the connection information (server, username, password, and database name).
- The connection is verified successfully.

- Receiving data:
- POST request data containing the command (command) is received.

- Inserting the command into the database:
- The received command is inserted into the database table `commands`.
- If insertion is successful, a success message is displayed.
- If an error occurs, an error message is displayed.

Database:
- Confirm the existence of the named database
`robot_controler`.
- Confirm that a table called `Distance` contains a column `Id`.

a summary:
When you visit `index.html` in the browser, you can press buttons to send commands to `control.php`. `control.php` inserts these commands into a MySQL database. We made sure that XAMPP is working properly and that Apache and MySQL are running.

Final checkpoints:
1. Run Apache and MySQL in XAMPP.
2. Verify paths and permissions.
3. Check `httpd.conf` settings.
4. Ensure that the appropriate database and tables are in place.

End..

*** Cout << " Thank you For reading " << endl ; *** 


