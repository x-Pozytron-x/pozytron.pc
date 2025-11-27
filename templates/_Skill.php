<?php 
  $skills = get_data("SELECT * FROM pozytron_skills");
?>
<section class="card fade-in">
  <h3 class="card-title"><?=tr('skill', 'title') ?></h3>
  <div class="skills-grid">
    <? foreach($skills as $key => $value){echo '<span class="skill">' . $value["name_en"] . '</span>';}?>
  </div>
</section>