<html>
    <body>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 12px;
            }
        </style>
        <?php
            $servername = "localhost";
            $server_username = "root";
            $server_password = "";
            $dbname = "Store";

            // Create connection
            $conn = new mysqli($servername, $server_username, $server_password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $uname = $_POST["user_name"];
            $pass = $_POST["pwd"];
            $sql = "INSERT INTO Customers (username, password)
            VALUES ('". $uname ."', '". $pass."')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully<br/><br/>\n";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $sql = "SELECT * FROM Customers";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                echo "\t\t<table>\n";
                echo "\t\t\t<tr>\n";
                echo "\t\t\t\t<th>username</th>\n";
                echo "\t\t\t\t<th>password</th>\n";
                echo "\t\t\t</tr>\n";
                while($row = $result->fetch_assoc()) {
                    echo "\t\t\t<tr>\n";
                    echo "\t\t\t\t<td>" . $row["username"]. "</td>\n" . "\t\t\t\t<td>" . $row["password"]. "</td>\n";
                    echo "\t\t\t</tr>\n";
                }
                echo "\t\t</table>\n";
            }

            else {
                echo "0 results";
            }
        ?>
    </body>
</html>
