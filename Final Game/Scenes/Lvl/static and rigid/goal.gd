extends StaticBody2D

#const WINSCREEN = preload("res://Scenes/Lvl/main/winscreen.tscn")
# Called when the node enters the scene tree for the first time.
func _ready() -> void:
	#move_and_slide()
	#for index in get_slide_collision_count():
		#​#var collision := get_slide_collision(index)
		#var body := collision.get_collider()
		#print("Collided with: ", body.name)
		#get_tree().change_scene_to_file(WINSCREEN)
		pass # Replace with function body.


# Called every frame. 'delta' is the elapsed time since the previous frame.
func _process(delta: float) -> void:
	pass
#if something touches this add score or move to new screen "this is a test"
var score = 0;
# set up collison point if it equals one
#used https://stackoverflow.com/questions/69728827/how-do-i-detect-collisions-in-godot
