<?php
    class Car {
            
            public $car_name;
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
                $top_speed = $top_speed * 1000; // convert km to meter
                $this->top_speed= $top_speed;
            }

            public function set_acceleration($acceleration)
            {
                $this->acceleration= $acceleration;
            }

            public function time_calculation($target_distance)
            {
                $velocity = $this->top_speed / 3600; //convert hour to second
                $time = $velocity / $this->acceleration; 
                $distance = .5 * $this->acceleration * ($time * $time);

                if($target_distance == $distance) {
                    
                    return $time;
                
                }

                else if($target_distance < $distance) {
                    
                    $time = sqrt($target_distance / .5 / $this->acceleration); 
                    return $time; 
                }
                
                else if($target_distance > $distance) {
                
                    $rest_distance = $target_distance-$distance;
                    $rest_time = $rest_distance / $velocity;
                    $total_time = $rest_time + $time;
                
                    return $total_time;

                }
            

            }

        }
        
        $cars = [];
        
        if (isset($_POST['submit'])) {

            foreach($_POST['car_name'] as $key=>$name) {
                
                $name = $_POST['car_name'][$key];
                $speed = $_POST['top_speed'][$key];
                $acceleration = $_POST['acceleration'][$key];
                array_push($cars, set_new_car($name, $speed, $acceleration));
            
            }
        
            foreach($_POST['target_distance'] as $key=>$distance) {
                
                $best_car = $cars[0];
                $minimum_time = $cars[0]->time_calculation($distance);
                
                foreach($cars as $key=>$car) {
                    if($car->time_calculation($distance) < $minimum_time)
                        $best_car = $car;
                }
                include 'result_view.php';
            }
                        
        }
            
        function set_new_car($car_name, $top_speed, $acceleration) {
  
            $car_obj = new Car();
            $car_obj->set_car_name($car_name);
            $car_obj->set_top_speed($top_speed);
            $car_obj->set_acceleration($acceleration);
            return $car_obj;
  
        }
    

?>