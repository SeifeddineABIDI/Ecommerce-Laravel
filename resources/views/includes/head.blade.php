<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://unicons.iconscout.com/release/v3.0.6/css/line.css'><link rel="stylesheet" href="./style.css">
  <style>
      @import 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet';
  
  :root {
      --dk-gray-100: #F3F4F6;
      --dk-gray-200: #E5E7EB;
      --dk-gray-300: #D1D5DB;
      --dk-gray-400: #9CA3AF;
      --dk-gray-500: #6B7280;
      --dk-gray-600: #4B5563;
      --dk-gray-700: #374151;
      --dk-gray-800: #1F2937;
      --dk-gray-900: #053f66;
      --dk-dark-bg: #053f66;
      --dk-darker-bg: #053f66;
      --navbar-bg-color: #022842;
      --sidebar-bg-color: #032135;
      --sidebar-width: 250px;
  }
  
  * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
  }
  
  body {
      font-family: 'Inter', sans-serif;
      background-color: var(--dk-darker-bg);
      font-size: .925rem;
  }
  
  #wrapper {
      margin-left: var(--sidebar-width);
      transition: all .3s ease-in-out;
  }
  
  #wrapper.fullwidth {
      margin-left: 0;
  }
  
  
  
  /** --------------------------------
   -- Sidebar
  -------------------------------- */
  .sidebar {
      background-color: var(--sidebar-bg-color);
      width: var(--sidebar-width);
      transition: all .3s ease-in-out;
      transform: translateX(0);
      z-index: 9999999
  }
  
  .sidebar .close-aside {
      position: absolute;
      top: 7px;
      right: 7px;
      cursor: pointer;
      color: #EEE;
  }
  
  .sidebar .sidebar-header {
      border-bottom: 1px solid #333c2a
  }
  
  .sidebar .sidebar-header h5 a {
      color: var(--dk-gray-300)
  }
  
  .sidebar .sidebar-header p {
      color: var(--dk-gray-400);
      font-size: .825rem;
  }
  
  .sidebar .search .form-control ~ i {
      color: #2b2f3a;
      right: 40px;
      top: 22px;
  }
  
  .sidebar > ul > li {
      padding: .7rem 1.75rem;
  }
  
  .sidebar ul > li > a {
      color: var(--dk-gray-400);
      text-decoration: none;
  }
  
  /* Start numbers */
  .sidebar ul > li > a > .num {
      line-height: 0;
      border-radius: 3px;
      font-size: 14px;
      padding: 0px 5px
  }
  
  .sidebar ul > li > i {
      font-size: 18px;
      margin-right: .7rem;
      color: var(--dk-gray-500);
  }
  
  .sidebar ul > li.has-dropdown > a:after {
      content: '\eb3a';
      font-family: unicons-line;
      font-size: 1rem;
      line-height: 1.8;
      float: right;
      color: var(--dk-gray-500);
      transition: all .3s ease-in-out;
  }
  
  .sidebar ul .opened > a:after {
      transform: rotate(-90deg);
  }
  
  /* Start dropdown menu */
  .sidebar ul .sidebar-dropdown {
      padding-top: 10px;
      padding-left: 30px;
      display: none;
  }
  .sidebar ul .sidebar-dropdown.active {
      display: block;
  }
  
  .sidebar ul .sidebar-dropdown > li > a {
    font-size: .85rem;
      padding: .5rem 0;
      display: block;
  }
  /* End dropdown menu */
  
  .show-sidebar {
      transform: translateX(-270px);
  }
  
  @media (max-width: 767px) {
      .sidebar ul > li {
          padding-top: 12px;
          padding-bottom: 12px;
      }
  
      .sidebar .search {
          padding: 10px 0 10px 30px
      }
  }
  
  
  
  
  /** --------------------------------
   -- welcome
  -------------------------------- */
  .welcome {
      color: var(--dk-gray-300);
  }
  
  .welcome .content {
      background-color: var(--dk-dark-bg);
  }
  
  .welcome p {
      color: var(--dk-gray-400);
  }
  
  
  .image6 {
    position: absolute;
    top: 15px;
    border-radius: 50% ;
    right: 1376px;
    bottom: 1193px;
    left: 12px;
    width: 52px;
    height: 53px;
  }
  .image111 {
    position: absolute;
    top: 44px;
    border-radius: 50% ;
    color: #1c1c1c;
    right: 1371px;
    bottom: 1190px;
    left: 44px;
    width: 25px;
    height: 26px;
  }
  
  /** --------------------------------
   -- Statistics
  -------------------------------- */
  .statistics {
      color: var(--dk-gray-200);
  }
  
  .statistics .box {
      background-color: var(--dk-dark-bg);
  }
  
  .statistics .box i {
      width: 60px;
      height: 60px;
      line-height: 60px;
  }
  
  .statistics .box p {
      color: var(--dk-gray-400);
  }
  
 
  
  
  /** --------------------------------
   -- Charts
  -------------------------------- */
  .charts .chart-container {
      background-color: var(--dk-dark-bg);
  }
  
  .charts .chart-container h3 {
      color: var(--dk-gray-400)
  }
  
  
  
  
  /** --------------------------------
   -- users
  -------------------------------- */
  .admins .box .admin {
      background-color: var(--dk-dark-bg);
  }
  
  .admins .box h3 {
      color: var(--dk-gray-300);
  }
  
  .admins .box p {
      color: var(--dk-gray-400)
  }
  
  
  
  
  /** --------------------------------
   -- statis
  -------------------------------- */
  .statis {
      color: var(--dk-gray-100);
  }
  
  .statis .box {
      position: relative;
      overflow: hidden;
      border-radius: 3px;
  }
  
  .statis .box h3:after {
      content: "";
      height: 2px;
      width: 70%;
      margin: auto;
      background-color: rgba(255, 255, 255, 0.12);
      display: block;
      margin-top: 10px;
  }
  
  .statis .box i {
      position: absolute;
      height: 70px;
      width: 70px;
      font-size: 22px;
      padding: 15px;
      top: -25px;
      left: -25px;
      background-color: rgba(255, 255, 255, 0.15);
      line-height: 60px;
      text-align: right;
      border-radius: 50%;
  }
  
  
  
  
  
  .main-color {
      color: #ffc107
  }
  
  /** --------------------------------
   -- Please don't do that in real-world projects!
   -- overwrite Bootstrap variables instead.
  -------------------------------- */
  
  .navbar {
      background-color: var(--navbar-bg-color) !important;
      border: none !important;
  }
  .navbar .dropdown-menu {
      right: auto !important;
      left: 0 !important;
  }
  .navbar .navbar-nav>li>a {
      color: #EEE !important;
      line-height: 55px !important;
      padding: 0 10px !important;
  }
  .navbar .navbar-brand {color:#FFF !important}
  .navbar .navbar-nav>li>a:focus,
  .navbar .navbar-nav>li>a:hover {color: #EEE !important}
  
  .navbar .navbar-nav>.open>a,
  .navbar .navbar-nav>.open>a:focus,
  .navbar .navbar-nav>.open>a:hover {background-color: transparent !important; color: #FFF !important}
  
  .navbar .navbar-brand {line-height: 55px !important; padding: 0 !important}
  .navbar .navbar-brand:focus,
  .navbar .navbar-brand:hover {color: #FFF !important}
  .navbar>.container .navbar-brand, .navbar>.container-fluid .navbar-brand {margin: 0 !important}
  @media (max-width: 767px) {
      .navbar>.container-fluid .navbar-brand {
          margin-left: 15px !important;
      }
      .navbar .navbar-nav>li>a {
          padding-left: 0 !important;
      }
      .navbar-nav {
          margin: 0 !important;
      }
      .navbar .navbar-collapse,
      .navbar .navbar-form {
          border: none !important;
      }
  }
  
  .navbar .navbar-nav>li>a {
      float: left !important;
  }
  .navbar .navbar-nav>li>a>span:not(.caret) {
      background-color: #e74c3c !important;
      border-radius: 50% !important;
      height: 25px !important;
      width: 25px !important;
      padding: 2px !important;
      font-size: 11px !important;
      position: relative !important;
      top: -10px !important;
      right: 5px !important
  }
  .dropdown-menu>li>a {
      padding-top: 5px !important;
      padding-right: 5px !important;
  }
  .navbar .navbar-nav>li>a>i {
      font-size: 18px !important;
  }
  
  
  
  
  /* Start media query */
  
  @media (max-width: 767px) {
      #wrapper {
          margin: 0 !important
      }
      .statistics .box {
          margin-bottom: 25px !important;
      }
      .navbar .navbar-nav .open .dropdown-menu>li>a {
          color: #CCC !important
      }
      .navbar .navbar-nav .open .dropdown-menu>li>a:hover {
          color: #FFF !important
      }
      .navbar .navbar-toggle{
          border:none !important;
          color: #EEE !important;
          font-size: 18px !important;
      }
      .navbar .navbar-toggle:focus, .navbar .navbar-toggle:hover {background-color: transparent !important}
  }
  
  
  ::-webkit-scrollbar {
      background: transparent;
      width: 5px;
      height: 5px;
  }
  
  ::-webkit-scrollbar-thumb {
      background-color: #3c3f58;
  }
  
  ::-webkit-scrollbar-thumb:hover {
      background-color: rgba(0, 0, 0, 0.3);
  }
  </style>
  </head>