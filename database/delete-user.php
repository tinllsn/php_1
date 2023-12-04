<?php 
    $data=$_POST;

    $user_id=(int)$data['user_id'];
    $first_name=(int)$data['f_name'];
    $last_name=(int)$data['l_name'];
    
    try {
        $command="DELETE FROM users WHERE id={$user_id}"; 
         
 
        include('connection.php');

        $conn->exec($command);

        echo json_encode([
            'success'=>true,
            'message'=> 'Successfully deleted.'
            // 'message'=> $first_name.' ' .$last_name.' successfully deleted.'

        ]);
        
       
    } catch (PDOException $e) {
        echo json_encode([
            'success'=>false,
            'message'=> 'Error processing your request!'
        ]);
    }


    
?>