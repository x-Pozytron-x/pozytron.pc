
<section class="achievements-section">
  <h2 class="section-title">
    <?=tr('achievement', 'title') ?>
  </h2>
  <div class="achievements-grid">
    <div class="achievement-card fade-in">
      <div class="achievement-icon" style="color: #00e5ff;">
        <i class="fa fa-briefcase" aria-hidden="true"></i>
      </div>
      <div class="achievement-content">
        <div class="achievement-number">
          <?=date("Y") - tr('achievement', '1_number') . "+"; ?>
        </div>
        <div class="achievement-title">
          <?=tr('achievement', '1_title') ?>
        </div>
        <div class="achievement-description">
          <?=tr('achievement', '1_descr') ?>
        </div>
      </div>
    </div>

    <div class="achievement-card fade-in">
      <div class="achievement-icon" style="color: #b388ff;">
        <i class="fa fa-globe" aria-hidden="true"></i>
      </div>
      <div class="achievement-content">
        <div class="achievement-number">
          <?=tr('achievement', '2_number') ?>
        </div>
        <div class="achievement-title">
          <?=tr('achievement', '2_title') ?>
        </div>
        <div class="achievement-description">
          <?=tr('achievement', '2_descr') ?>
        </div>
      </div>
    </div>

    <div class="achievement-card fade-in">
      <div class="achievement-icon" style="color: #00e5ff;">
        <i class="fa fa-wrench" aria-hidden="true"></i>
      </div>
      <div class="achievement-content">
        <div class="achievement-number">12+</div>
        <div class="achievement-title">
          <?=tr('achievement', '3_title') ?>
        </div>
        <div class="achievement-description">
          <?=tr('achievement', '3_descr') ?>
        </div>
      </div>
    </div>

    <div class="achievement-card fade-in">
      <div class="achievement-icon" style="color: #b388ff;">
        <i class="fa fa-rocket" aria-hidden="true"></i>
      </div>
      <div class="achievement-content">
          <div class="achievement-number">30+</div>
          <div class="achievement-title">
            <?=tr('achievement', '4_title') ?>
          </div>
          <div class="achievement-description">
            <?=tr('achievement', '4_descr') ?>
          </div>
      </div>
    </div>
  </div>
</section>