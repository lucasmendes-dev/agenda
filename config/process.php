<?php

    session_start();

    include_once("connection.php");
    include_once("url.php");

    $data = $_POST;
    
    if(!empty($data)){

        if($data["type"] === "create"){
            
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $observations = $_POST["observations"];

            $query = "INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":observations", $observations);

            try{
                
                $stmt->execute();

                $_SESSION["msg"] = "Contato criado com sucesso";

            }catch(PDOException $e) {
                
                $error = $e->getMessage();
                echo "Erro: $error";
            }
        }

        else if($data["type"] === "edit"){
            
            
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $observations = $_POST["observations"];
            $id = $_POST['id'];

            $query = "UPDATE contacts 
                      SET name = :name, phone = :phone, observations = :observations 
                      WHERE id = :id";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":observations", $observations);
            $stmt->bindParam(":id", $id);

            try{
                
                $stmt->execute();

                $_SESSION["msg"] = "Contato atualizado com sucesso";

            }catch(PDOException $e) {
                
                $error = $e->getMessage();
                echo "Erro: $error";
            }
        }

        else if($data["type"] === "delete"){
            
            $id = $_POST['id'];

            $query = "DELETE FROM contacts WHERE id = :id";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":id", $id);

            try{
                
                $stmt->execute();

                $_SESSION["msg"] = "Contato removido com sucesso";

            }catch(PDOException $e) {
                
                $error = $e->getMessage();
                echo "Erro: $error";
            }
        }
    
    header("Location:" . $BASE_URL . "../index.php");    
    
    } else {

        $id;
        $contacts = [];

        if(!empty($_GET['id'])){
            $id = $_GET['id'];
        }
        

        if(!empty($id)){
            
            $query = "SELECT * FROM contacts WHERE id = :id";

            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $contact = $stmt->fetch(); 

        } else {
        
            $query = "SELECT * FROM contacts";

            $stmt = $conn->prepare($query);

            $stmt->execute();

            $contacts = $stmt->fetchAll(); 
        }
    }

    $conn = null;
?>
    