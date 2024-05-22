<!DOCTYPE html>
<html lang="en" >
    @include("includes.head")
    <header>
        <title> Kraken </title>
    </header>
<body>


@include('includes.navbar')
<section id="wrapper">

  <section id="welcome">
    <div class="p-4">
     <div class="welcome">
       <div class="content rounded-3 p-3">
         <h1 class="fs-3">Welcome to dashboard </h1>
       </div>
     </div>
    </div>
    </section>



    <section class="charts mt-4">
      <div class="row">
        <div class="col-lg-6">
          <div class="chart-container rounded-2 p-3">
            <h3 class="fs-6 mb-3">Chart title number one</h3>
            <canvas id="myChart"></canvas>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="chart-container rounded-2 p-3">
            <h3 class="fs-6 mb-3">Chart title number two</h3>
            <canvas id="myChart2"></canvas>
          </div>
        </div>
      </div>
    </section>



    <section class="statis mt-4 text-center">
      <div class="row">
        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
          <div class="box bg-primary p-3">
            <i class="uil-eye"></i>
            <h3>5,154</h3>
            <p class="lead">Page views</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
          <div class="box bg-danger p-3">
            <i class="uil-user"></i>
            <h3>245</h3>
            <p class="lead">User registered</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
          <div class="box bg-warning p-3">
            <i class="uil-shopping-cart"></i>
            <h3>5,154</h3>
            <p class="lead">Product sales</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="box bg-success p-3">
            <i class="uil-feedback"></i>
            <h3>5,154</h3>
            <p class="lead">Transactions</p>
          </div>
        </div>
      </div>
    </section>

    <section class="charts mt-4">
      <div class="chart-container p-3">
        <h3 class="fs-6 mb-3">Chart title number three</h3>
        <div style="height: 300px">
          <canvas id="chart3" width="100%"></canvas>
        </div>
      </div>
    </section>
  </div>
</section>
@include("includes.footer")
</body>
</html>