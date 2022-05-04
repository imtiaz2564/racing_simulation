<?php
    class Car {
            
            private $car_name;
            private $target_distance;
            private $top_speed;
            private $acceleration;
            
            
            public function set_car_name($name)
            {
                $this->car_name = $name;
            }

            public function set_target_distance($target_distance)
            {
                $this->target_distance = $target_distance;
            }

            public function set_top_speed($top_speed)
            {
                $this->top_speed= $top_speed;
            }

            public function set_acceleration($acceleration)
            {
                $this->acceleration= $acceleration;
            }

            public function time_calculation()
            {
                $target_distance = $this->target_distance;
                $top_speed = $this->top_speed;
                $acceleration = $this->acceleration;
                $velocity = $top_speed / 3600;
                $time = $velocity / $acceleration; 
                $distance = .5 * $acceleration * ($time * $time);

                if($target_distance == $distance) {
                    
                    echo $time;
                
                }

                if($target_distance < $distance) {
                    
                    $time = sqrt($target_distance / .5 / $acceleration); 
                    echo $time; 
                }
                
                if($target_distance > $distance) {
                
                    $rest_distance = $target_distance-$distance;
                    $rest_time = $rest_distance / $velocity;
                    $total_time = $rest_time + $time;
                
                    echo $total_time;

                }
            

            }

        }
        $car_obj = new Car();
        $car_obj->set_car_name("");
        $car_obj->set_target_distance(400);
        $car_obj->set_top_speed(302.4*1000);
        $car_obj->set_acceleration(7);
        echo $car_obj->time_calculation();
    

?>