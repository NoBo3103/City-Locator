<?php
    $con = mysqli_connect("localhost", "root", "", "germin");
    if(isset($_GET['q'])){
        $q = $_GET['q'];
        $stmt = $conn->prepare("SELECT * FROM city WHERE name LIKE ?");
        $param = "%$q%";
        $stmt->bind_param("ss", $param, $param);
        $data = array();
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->$num_rows>0){
                while($row = $result->fetch_assoc()){
                    $id = $row['id'];
                    $city = $row['name'];
                    $data[] = array('id'=>$id, 'text'=>$city);
                }
                $stmt->close();
            }
            else{
                $data[] = array('id'=>0, 'text'=>'No city found.');
            }
            echo json_encode($data);
        }
    }
?>