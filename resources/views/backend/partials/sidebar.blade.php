<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">TABLEAU DE BORD</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active">
          <a href="{{ route('admin.home') }}">
            <i class="fa fa-dashboard"></i> <span>Tableau de bord</span>
          </a>
        </li>
        <li>
            <a href="{{ route('admin.orders.index') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>Commandes</span></a>
        </li>

        <li>
            <a href="{{ route('admin.customer.index') }}"><i class="fa fa-users" aria-hidden="true"></i> <span>Mes Clients</span></a>
        </li>

        <li class="treeview">
            <a href="#"><i class="fa fa-tag" aria-hidden="true"></i> <span>Famille</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('admin.famille.create') }}">Ajouter une famille</a></li>
              <li><a href="{{ route('admin.famille.index') }}">Voir les familles</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#"><i class="fa fa-tags" aria-hidden="true"></i> <span>Categories</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('admin.category.create') }}">Ajouter une catégorie</a></li>
              <li><a href="{{ route('admin.category.index') }}">Voir les catégories</a></li>
            </ul>
        </li>
     
        <li class="treeview">
            <a href="#"><i class="fa fa-bookmark" aria-hidden="true"></i> <span>Produits</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('admin.product.create') }}">Ajouter un produit</a></li>
              <li><a href="{{ route('admin.product.index') }}">Voir les produits</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('admin.transporteurs.index') }}"><i class="fa fa-truck" aria-hidden="true"></i><span>Transporteurs</span></a>
        </li>
        <li>
            <a href="{{ route('admin.devise.index') }}"><i class="fa fa-balance-scale" aria-hidden="true"></i><span>Dévise</span></a>
        </li>
        <li>
            <a href="{{ route('admin.media') }}"><i class="fa fa-picture-o" aria-hidden="true"></i><span>Média</span></a>
        </li>
        <li>
            <a href="{{ route('admin.settings') }}"><i class="fa fa-cogs" aria-hidden="true"></i><span>Paramètre</span></a>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>