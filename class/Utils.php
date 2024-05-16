<?php 

    class Bootstrap {
        public function displayAlert($message, $type) {
            echo '<div class="alert alert-'. $type .'" role="alert">';
            echo ''. $message .'';
            echo '</div>';
        }
    }

?>