<?php
  $experience = get_data("SELECT * FROM pozytron_experience");
?>

<div class="card fade-in">
  <h3 class="card-title">Experience</h3>

  <div class="timeline">

  <? foreach($experience as $key => $value)  {
    echo '<div class="timeline-item">';
      echo '<div class="timeline-dot"></div>';
      echo '<div class="timeline-content">';
        echo '<div class="job-period">'. $value["experience_start"] . ' - ' . $value["experience_end"] .'</div>'; 
        echo '<h4 class="job-title">'. $value["experience_title_en"] .'</h4>';
        echo '<div class="company-name">'. $value["experience_company"] .'</div>';
        echo '<div class="job-location">'. calculate_date_difference($value["experience_start"], $value["experience_end"]) .'</div>';
        echo '<p class="job-description">';
          echo $value["experience_descr_en"];
        echo '</p>';
      echo '</div>';
    echo '</div>';
  } ?>

  </div> 
</div>