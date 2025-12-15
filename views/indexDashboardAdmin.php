<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/styleDashboardAdmin.css">
</head>

<body>
  <aside class="sidebar">
    <div class="d-flex flex-column align-items-center w-100">
      <div class="sidebar-box box-blue" title="Home" onclick="window.location.href = '/'">Home</div>
    </div>
    <div class="mt-auto">
      <div class="sidebar-box box-blue mb-0" title="Logout" id="btn-logout">Logout</div>
    </div>
  </aside>

  <div class="main-wrapper">

    <div class="d-flex justify-content-between align-items-center mb-5">
      <h1 class="header-title m-0">Dashboard - Admin</h1>
      <div class="d-flex align-items-center gap-3 profile-section">
        <div class="profile-avatar"></div>
        <div class="d-flex flex-column">
          <span class="fw-bold" style="font-size: 1.1rem;"><?= $username ?></span>
          <small style="color: #666;">@<?= (empty($placeholder) ? $username : $placeholder) ?></small>
        </div>
      </div>
    </div>

    <div class="row gx-5">
      <div class="col-lg-8">
        <div class="row g-4 mb-4 horizontal-scroll" id="job-row">
        </div>

        <div class="application-section">
          <div class="section-header">
            <h2 class="fw-bold fs-4 m-0">Users</h2>
            <a href="#" class="view-all-btn">View All</a>
          </div>

          <div class="row table-head mx-0">
            <div class="col-5 ps-0">Username</div>
            <div class="col-5">Type</div>
            <div class="col-2 text-end pe-0"></div>
          </div>

          <div id="user-list"></div>
        </div>

      </div>

      <div class="col-lg-4">
        <div class="right-widget-container">

          <h3 class="widget-title">Admin Statistics</h3>
          <div id="admin-stats">
            <div class="col-lg-4">


              <div class="right-widget-container">
                <h3 class="widget-title">Admin Statistics</h3>
                <div id="admin-stats" class="stats-list">
                  <div class="text-muted">Loading...</div>
                </div>
              </div>
            </div>

            <div class="right-widget-container">
              <h3 class="widget-title">Most Viewed</h3>
              <div class="card-custom inner-card">
                <div class="img-placeholder" style="border-bottom: 1px solid #000;"></div>
                <div class="card-body-custom">
                  <div class="card-title">Event #2</div>
                  <div class="card-desc">This is Description</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      <script src="/js/scriptDashboardAdmin.js"></script>
</body>
</html>
