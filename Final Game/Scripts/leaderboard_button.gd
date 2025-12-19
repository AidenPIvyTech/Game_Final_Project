extends Button

func _process(delta):
	pass


func _on_button_pressed() -> void:
	print('button pressed')
	add_instructor("GodotTest", "300")

var backend_url = "http://localhost/GetTheCue_api/api.php?action=readuser"

func add_instructor(username, highscore):
	var http = HTTPRequest.new()
	add_child(http)
	http.request_completed.connect(_on_request_completed)
	var data = {
		"name": username,
		"score": highscore
	}
	var body = JSON.stringify(data)
	var headers = ["Content-Type: application/json"]
	http.request(backend_url, headers, HTTPClient.METHOD_POST, body)

func _on_request_completed(result, response_code, headers, body):
	if response_code == 200:
		print("Success")
	else:
		print("failed")
