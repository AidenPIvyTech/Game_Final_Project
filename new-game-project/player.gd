
#
#@export var speed = 400
#@export var rotation_speed = 1.5
#
#var rotation_direction = 0
#
#func get_input():
	#look_at(get_global_mouse_position())
	##velocity = transform.x * Input.get_axis("down", "up") * speed
	##rotation_direction = Input.get_axis("ui_left", "ui_right")
	##velocity = transform.x * Input.get_axis("down", "up") * speed
#
#func _physics_process(delta):
	#get_input()
	##rotation += rotation_direction * rotation_speed * delta

extends CharacterBody2D

@export var speed = 400

var target = position

func _input(event):
	# Use is_action_pressed to only accept single taps as input instead of mouse drags.
	if event.is_action_pressed(&"click"):
		target = get_global_mouse_position()

#func _physics_process(delta):
	#velocity = position.direction_to(target) * speed
	##look_at(target)
	#if position.distance_to(target) > 10:
		#move_and_slide()
@export var rotation_speed = 1.5

var rotation_direction = 0

func get_input():
	rotation_direction = Input.get_axis("move_left", "move_right")
	velocity = transform.x * Input.get_axis("move_down", "move_up") * speed

func _physics_process(delta):
	get_input()
	rotation += rotation_direction * rotation_speed * delta
	velocity = position.direction_to(target) * speed
	look_at(target)
	if position.distance_to(target) > 10:
		move_and_slide()
	
	
