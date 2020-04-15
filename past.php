<?php
if(isset($_GET['id'])){
$user_id=$_GET['id'];
}
         require("config.php");
                $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";

                        $db = new PDO($connection_string, $dbuser, $dbpass);

$stmt= $db->prepare("SELECT * from Info where user_id=:id LIMIT 3");
$r=$stmt->execute(
        array(":id"=>$user_id)
);

$results=$stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php foreach($results as $Info):?>
        <div>
             	<div><?php echo $Info['breakfast'];?></div>
                <div><?php echo $Info['lunch'];?></div>
                <div><?php echo $Info['dinner'];?></div>
                <div><?php echo $Info['snack'];?></div>
        </div>

<?php endforeach;?>

