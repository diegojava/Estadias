 <div class="small-box bg-aqua">
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
              $idProff = $_SESSION['id'];
              if($_SESSION["cargo"] == "admin"){ 
              $sql = "SELECT count(*) as total FROM alumno WHERE estatus = 1";}
              if($_SESSION["cargo"] == "profesor"){ 
              $sql = "SELECT count(*) as total FROM alumno WHERE estatus = 1 AND idProfesor = $idProff";}
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

              <p>alumnos registrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="alumnos.php" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
</div>