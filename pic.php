            <?php
            include"conn.php";
            $sql = "SELECT * FROM login where id=$id";
            $result = $conn->query($sql);
                 

            

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    
                    
                    $img = $row["img"];
                    
                    
                }
            } else {
                echo "No results found.";
            }
            
            
            
        
            
