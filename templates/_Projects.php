<?php

$projects = [
    [
    'img' => 'my-budget.webp',
    'img_alt' => 'Personal budget management web app',
    'status' => 'In Progress',
    'title' => 'My Budget — Personal Finance Web App',
    'description' => 'A custom-built personal budget management system developed without a CMS. PHP backend with Smarty templates, vanilla JavaScript, and SCSS-based styling.',
    'tags' => ['PHP', 'Smarty', 'JavaScript', 'HTML', 'CSS', 'SCSS'],
    'live_link' => 'https://my-budget.top/',
    'code_link' => null
    ],
  [
    'img' => 'rentent.webp',
    'img_alt' => 'Rentent project preview',
    'status' => 'Completed',
    'title' => 'Rentent — Real Estate Platform (Israel)',
    'description' => 'Pixel-perfect layout based on provided designs with full WordPress theme integration. Custom templates, clean structure, fast loading.',
    'tags' => ['HTML', 'CSS', 'WordPress'],
    'live_link' => 'https://rentent.co.il/',
    'code_link' => null
  ],
  [
    'img' => 'asiatrading.webp',
    'img_alt' => 'Asia Trading GPA website',
    'status' => 'Completed',
    'title' => 'Asia Trading GPA — Corporate Site',
    'description' => 'Clean and structured layout delivered under a tight deadline using lightweight HTML, CSS, and JavaScript.',
    'tags' => ['HTML', 'CSS', 'SCSS', 'JavaScript'],
    'live_link' => 'https://asiatradinggpa.com/',
    'code_link' => null
  ],
  [
    'img' => 'sgpremium.webp',
    'img_alt' => 'SG Premium Space screenshot',
    'status' => 'Completed',
    'title' => 'SG Premium Space — CMS Integration',
    'description' => 'Frontend development and integration into the company internal CMS with fast delivery and precise UI implementation.',
    'tags' => ['HTML', 'CSS', 'SCSS', 'JavaScript', 'Smarty', 'PHP'],
    'live_link' => 'https://sgpremiumspace.com/',
    'code_link' => null
  ],
  [
    'img' => 'js-mini.webp',
    'img_alt' => 'Mini JavaScript projects gallery',
    'status' => 'Personal',
    'title' => 'JavaScript Mini Projects Collection',
    'description' => 'A set of small interactive apps built while learning JavaScript. Pure vanilla JS with clean and simple structure.',
    'tags' => ['JavaScript', 'HTML', 'CSS'],
    'live_link' => 'https://x-pozytron-x.github.io/',
    'code_link' => 'https://github.com/x-Pozytron-x/x-Pozytron-x.github.io'
  ]
];

?>


<section class="projects-section">
  <h2 class="section-title">Featured Projects</h2>
  <div class="projects-grid">

    <?php foreach ($projects as $project) { ?>
    <div class="project-card fade-in">
      <div class="project-image"
        style="background-image: url(/assets/img/<?=$project['img'];?>); background-size: cover;">
        <!-- // <img src="/assets/img/<?=$project['img'];?>" alt="<?=$project['img_alt'];?> fetchpriority=" high"> -->
        <div class="project-status">Live</div>
      </div>
      <div class="project-content">
        <h3 class="project-title">
          <i class="fas fa-store"></i>
          <?=$project['title'];?>
        </h3>
        <p class="project-description">
          <?=$project['description'];?>
        </p>

        <div class="project-tech">
          <?php foreach ($project['tags'] as $tag) { ?>
          <span class="tech-tag"><?=$tag;?></span>
          <?php } ?>
        </div>
        <div class="project-buttons">
          <a href="<?=$project['live_link'];?>" class="project-button">
            <i class="fas fa-external-link-alt"></i>
            Live
          </a>
          <?php if($project['code_link']) { ?>
          <a href="<?=$project['code_link'];?>" class="project-button secondary">
            <i class="fa fa-github"></i>
            Code
          </a>
          <?php } ?>
        </div>
      </div>
    </div>

    <?php }; ?>

  </div>
</section>