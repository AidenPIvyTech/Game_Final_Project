extends PanelContainer

const LEVELSCREEN = preload("res://Scenes/Menus/levelsScreen.tscn")
const LEADERBOARD = preload("res://Scenes/Menus/leaderboard.tscn")
# Called when the node enters the scene tree for the first time.
func _ready() -> void:
	pass # Replace with function body.


# Called every frame. 'delta' is the elapsed time since the previous frame.
func _process(delta: float) -> void:
	pass

func _on_play_button_pressed() -> void:
	get_tree().change_scene_to_packed(LEVELSCREEN)


func _on_leaderboard_button_pressed() -> void:
	get_tree().change_scene_to_packed(LEADERBOARD)


func _on_settings_button_pressed() -> void:
	pass # Replace with function body.
