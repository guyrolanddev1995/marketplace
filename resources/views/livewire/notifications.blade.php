<div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-shopping-basket"></i></span>
  
          <div class="info-box-content">
            <span class="info-box-text">Produits en ligne</span>
            <span class="info-box-number">{{ $productCounts }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
  
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-hourglass-end"></i></span>
  
          <div class="info-box-content">
            <span class="info-box-text">Stock épuisé</span>
            <span class="info-box-number">{{ $stock_epuise }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
  
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
  
          <div class="info-box-content">
            <span class="info-box-text">Vendeurs</span>
            <span class="info-box-number">0</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
  
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
  
          <div class="info-box-content">
            <span class="info-box-text">Clients</span>
            <span class="info-box-number">{{ $users }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
</div>
