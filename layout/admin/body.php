<style>
  @keyframes fadeIn {
    0% {
      opacity: 0;
    }

    100% {
      opacity: 1;
    }
  }

  .alert {
    animation: fadeIn 1s;
  }
</style>
<section class="content container-fluid">
  <div id="result">
    <?= success_msg(); ?>
  </div>
  <div id="content">
    <section class="content-header">
      <!-- Content Header (Page header) -->
      <h1>
        Welcome to <strong><?= SYSTEM_NAME; ?></strong>, Click An Item From The Left Sidebar Menu To Get Started!
      </h1>

    </section>
  </div>
</section>