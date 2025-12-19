extends PanelContainer

func _on_back_button_pressed() -> void:
	get_tree().change_scene_to_file("res://Scenes/Menus/Main_Menu.tscn")
	
	
func _ready() -> void:
	$HTTPRequest.request_completed.connect(_on_request_completed)
	
# Called every frame. 'delta' is the elapsed time since the previous frame.
func _process(delta: float) -> void:
	pass


func _on_request_completed(result, response_code, headers, body):
	print("request complete")
	var json_inst = JSON.new()
	var json_body = json_inst.get_string_from_utf8()
	var json_result = json_inst.parse(json_body)
	var data = json_result.data
	print(data)
