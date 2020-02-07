<?php
	include('config.php');
	$baseDomain = $GLOBAL['BASE_DOMAIN'];
	if(isset($_POST['key']) && isset($_POST['link'])) {
		include('database.php');
		$key = $_POST['key'];

        $sqlCheckKey = 'SELECT id from user where user_key=:key limit 1';

		$resultCheckKey = $database->prepare($sqlCheckKey);
		$resultCheckKey->setFetchMode(PDO::FETCH_ASSOC);
		$resultCheckKey->execute([':key' => $key]);

		if($resultCheckKey->rowCount() > 0){
			if ($link = $_POST['link']) {
				// check existed link
				$sqlCheckLink = 'SELECT id from url where link=:link limit 1';

				$resultCheckLink = $database->prepare($sqlCheckLink);
				$resultCheckLink->setFetchMode(PDO::FETCH_ASSOC);
				$resultCheckLink->execute([':link' => $link]);
				if($resultCheckLink->rowCount() > 0){
					$eachrow = $resultCheckLink->fetch();
					// echo $eachrow['id'].'.'.$baseDomain;
					$jsonResult = array(
					    "status" => $GLOBAL['STT_SUCCESS'],
					    "message" => $baseDomain.'/'.$eachrow['id']
					);

					echo json_encode($jsonResult);
					exit();
				}

				$sqlInsertLink = 'INSERT into url (id, link) values (:id, :link)';
				$insertLink = $database->prepare($sqlInsertLink);

				while(1){
				    $id = random6String();
					try {
						$resultInsertLink = $insertLink->execute([':id' => $id, ':link' => $link]);
						break;
					} catch (PDOException $e) {
						continue;
					}
				}
				// echo $id.'.'.$baseDomain;
				$jsonResult = array(
					"status" => $GLOBAL['STT_SUCCESS'],
					"message" => $baseDomain.'/'.$id
				);

				echo json_encode($jsonResult);
			}else {
				// echo "Link cant be empty!";
				$jsonResult = array(
					"status" => $GLOBAL['STT_LINK_EMPTY'],
					"message" => $GLOBAL['MESS_LINK_EMPTY']
				);

				echo json_encode($jsonResult);
			}

		}else {
			// echo "Key not found";
			$jsonResult = array(
				"status" => $GLOBAL['STT_KEY_INVALID'],
				"message" => $GLOBAL['MESS_KEY_INVALID']
			);

			echo json_encode($jsonResult);
		}

	}else {
		// echo "Parameter invalid";
		$jsonResult = array(
			"status" => $GLOBAL['STT_PRAMETTER_INVALID'],
			"message" => $GLOBAL['MESS_PRAMETTER_INVALID']
		);

		echo json_encode($jsonResult);
	}

	function random6String() {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < 6; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
?>

