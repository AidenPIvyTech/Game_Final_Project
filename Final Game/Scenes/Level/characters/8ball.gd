extends RigidBody2D
var velocity = Vector2(250, 250)
# this is how it bounces
func _physics_process(delta):
#	this makes it move till it collides
	var collision = move_and_collide(velocity * delta)
	if collision:
		var collision_info = move_and_collide(velocity * delta)
		if collision_info:
			var collision_point = collision_info.get_position()
			print(collision_point)
			velocity = velocity.bounce(collision_info.get_normal())
			

#used stuf from https://docs.godotengine.org/en/stable/tutorials/physics/physics_introduction.html
