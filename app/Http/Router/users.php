<?php

$db = db();
$db::connection();

$app->get('/', ["middleware" => "auth"]);

$app->get('/users', function($req, $res) use ($db)
{
	$data = $db::select("select * from users");
	if (count($data) == 0) {
		$empty = true;
	} else {
		$empty = false;
	}
	$res->json(["empty" => $empty, "data" => $data]);

});

$app->get('/users/:id', function($req, $res, $id) use ($db)
{

	$res->json($db::select("select * from users where id = :id", ["id" => $id]));

})->where(["id" => "\d+"]);

$app->get('/users/delete/:id', function($req, $res, $id) use ($db)
{
	$data = $db::select("select * from users where id = :id", ["id" => $id]);
	$status = $db::delete("delete from users where id = :id", ["id" => $id]);

	if ($status === false) {
		$data = ["error" => true, "data" => $data];
	} else {
		if (count($data) == 0) {
			$data = ["error" => true, "data" => $data];
		} else {
			$data = ["error" => false, "data" => $data];
		}
	}
	$res->json($data);

})->where(["id" => "\d+"]);

$app->post("/users/post", function($req, $res) use ($db)
{
	$status = $db::insert("insert into users set name = :name, lastname = :lastname, email = :email", $req::body()->get());
	if ($status == true) {
		$data = ["success" => true];
	} else {
		$data = ["success" => false];
	}
	$data["data"] = $req::body()->get();
	$res->json($data);
});