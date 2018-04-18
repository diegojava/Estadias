<div class="small-box bg-yellow">
            <div class="inner">
              <h3>

                <?php
                $servername = "localhost";
                $username = "root";
                $password = "root";
                $dbname = "dbaprende";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT count(*) as total FROM alumno WHERE estatus = 0";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo " " . $row["total"]. "<br>";
                    }
                } else {
                    echo "error";
                }
                $conn->close();
                ?>

              </h3>

              <p>alumnos bloqueados</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-warning"></i>
            </div>
            <a href="#" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
          </div>