<?php
include 'db.php';

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

function send_response($data, $http_code = 200) {
    http_response_code($http_code); // Set the HTTP status code
    echo json_encode($data); // Convert the response data to JSON
    exit(); // Stop further script execution
}

// $action = isset($_GET['action']) ? $_GET['action'] : '';
// if ($action == '') {
//     $action = isset($_POST['action']) ? $_POST['action'] : '';
// }
$action = isset($_POST['action']) ? $_POST['action'] : '';
echo 'ACTION: ' . $action;

switch (strtolower($action)) {
    //Create User Read Action
    
    case 'readuser':
        if (isset($_GET['UserId'])) {
            // Get a single user by ID
            $id = $_GET['UserId'];

            // Use a prepared statement to prevent SQL injection
            $stmt = $pdo->prepare("SELECT * FROM users WHERE UserId = :UserId");
            $stmt->execute(['id' => $id]); // Bind the ID parameter
            $data = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the result as an associative array

            send_response($data); // Send the user data as a response
        } else {
            // Get all users
            $stmt = $pdo->query("SELECT * FROM users"); // Execute a simple query
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all rows as an associative array

            send_response($users); // Send the list of users as a response
        }
        break;

    //Create User Post Action
    case 'createuser':
        if (isset($_POST['Username'], $_POST['Levels_Beat'], $_POST['Collectables_Got'], $_POST['Highscore'])) {
            $username = $_POST['Username'];
            $levelsBeat = $_POST['Levels_Beat'];
            $collectablesGot = $_POST['Collectables_Got'];
            $highscore = $_POST['Highscore'];


            // Use a prepared statement to insert data securely
            $stmt = $pdo->prepare("INSERT INTO users (Username, Levels_Beat, Collectables_Got, Highscore) VALUES (:Username, :Levels_Beat, :Collectables_Got, :Highscore)");
            $success = $stmt->execute(['Username' => $username, 'Levels_Beat' => $levelsBeat, 'Collectables_Got' => $collectablesGot, 'Highscore' => $highscore]);

            if ($success) {
                // Respond with a success message and the new user's ID
                send_response(["message" => "User added successfully", "id" => $pdo->lastInsertId()]);
            } else {
                send_response(["message" => "Error creating user"], 500);
            }
        } else {
            // Respond with an error if required fields are missing
            send_response(["message" => "Missing required fields for creation"], 400);
        }
        break;

    //Create User Update Action
    case 'updateuser':
        if (isset($_POST['Username'], $_POST['Levels_Beat'], $_POST['Collectables_Got'], $_POST['Highscore'])) {
            $username = $_POST['Username'];
            $levelsBeat = $_POST['Levels_Beat'];
            $collectablesGot = $_POST['Collectables_Got'];
            $highscore = $_POST['Highscore'];


            // Use a prepared statement to insert data securely
            $stmt = $pdo->prepare("UPDATE users SET username = :Username, Levels_Beat = :Levels_Beat, Collectables_Got = :Collectable_Got, Highscore = :Highscore WHERE UserId = ?");
            $success = $stmt->execute(['Username' => $username, 'Levels_Beat' => $levelsBeat, 'Collectables_Got' => $collectablesGot, 'Highscore' => $highscore]);

            if ($success) {
                // Respond with a success message and the new user's ID
                send_response(["message" => "User updated successfully", "id" => $pdo->lastInsertId()]);
            } else {
                send_response(["message" => "Error updated user"], 500);
            }
        } else {
            // Respond with an error if required fields are missing
            send_response(["message" => "Missing required fields for update"], 400);
        }
        break;

    //Create User Delete Action
    case 'deleteuser':
        if (isset($_GET['UserId'])) {
            $id = $_GET['Userid'];

            // Use a prepared statement to delete data securely
            $stmt = $pdo->prepare("DELETE FROM users WHERE UserId = :UserId");
            $success = $stmt->execute(['UserId' => $id]);

            if ($success) {
                send_response(["message" => "User deleted successfully"]);
            } else {
                send_response(["message" => "Error deleting user"], 500);
            }
        } else {
            // Respond with an error if the ID is missing
            send_response(["message" => "Missing required ID for delete"], 400);
        }
        break;

    //Create Level Post Action
    case 'createlevel':
        echo 'create level called!!!!';
        if (isset($_POST['CollectableId'], $_POST['LevelName'])) {
            $collectableId = $_POST['CollectableId'];
            $levelName = $_POST['LevelName'];

            // Use a prepared statement to insert data securely
            $stmt = $pdo->prepare("INSERT INTO levels (CollectableId, LevelName) VALUES (:CollectableId, :LevelName)");
            $success = $stmt->execute(['CollectableId' => $collectableId, 'LevelName' => $levelName]);

            if ($success) {
                // Respond with a success message and the new user's ID
                send_response(["message" => "Level added successfully", "id" => $pdo->lastInsertId()]);
            } else {
                send_response(["message" => "Error creating level"], 500);
            }
        } else {
            // Respond with an error if required fields are missing
            send_response(["message" => "Missing required fields for creation"], 400);
        }
        break;

    //Create Level Update Action

    case 'updatelevel':
        if (isset($_POST['CollectableId'], $_POST['LevelName'])) {
            $collectableId = $_POST['CollectableId'];
            $levelName = $_POST['LevelName'];

            // Use a prepared statement to insert data securely
            $stmt = $pdo->prepare("UPDATE levels SET CollectableId = :CollectableId");
            $success = $stmt->execute(['CollectableId' => $collectableId]);

            if ($success) {
                // Respond with a success message and the new user's ID
                send_response(["message" => "Level updated successfully", "id" => $pdo->lastInsertId()]);
            } else {
                send_response(["message" => "Error updating level"], 500);
            }
        } else {
            // Respond with an error if required fields are missing
            send_response(["message" => "Missing required fields for creation"], 400);
        }
        break;



    //Create Level Delete Action

    case 'deletelevel':
        if (isset($_GET['LevelId'])) {
            $LevelId = $_GET['LevelId'];

            // Use a prepared statement to delete data securely
            $stmt = $pdo->prepare("DELETE FROM levels WHERE LevelId = :LevelId");
            $success = $stmt->execute(['id' => $LevelId]);

            if ($success) {
                send_response(["message" => "Level deleted successfully"]);
            } else {
                send_response(["message" => "Error deleting Level"], 500);
            }
        } else {
            // Respond with an error if the ID is missing
            send_response(["message" => "Missing required ID for delete"], 400);
        }
        break;


    

// GET http://localhost/GetTheCue_api/api.php


}

?>