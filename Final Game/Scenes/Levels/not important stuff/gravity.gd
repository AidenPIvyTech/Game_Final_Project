extends CharacterBody2D

const GRAVITY = 200.0

func _physics_process(delta):
	velocity.y += delta * GRAVITY

	var motion = velocity * delta
	move_and_collide(motion)
