<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile not-navigation-link" style="display: none;">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            <img src="{{ url('assets/images/faces/face8.jpg') }}" alt="profile image">
          </div>
          <div class="text-wrapper">
            <p class="profile-name">Richard V.Welsh</p>
            <div class="dropdown" data-display="static">
              <a href="#" class="nav-link d-flex user-switch-dropdown-toggler" id="UsersettingsDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <small class="designation text-muted">Manager</small>
                <span class="status-indicator online"></span>
              </a>
              <div class="dropdown-menu" aria-labelledby="UsersettingsDropdown">
                <a class="dropdown-item p-0">
                  <div class="d-flex border-bottom">
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                      <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                    </div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                      <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                    </div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                      <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item mt-2"> Manage Accounts </a>
                <a class="dropdown-item"> Change Password </a>
                <a class="dropdown-item"> Check Inbox </a>
                <a class="dropdown-item"> Sign Out </a>
              </div>
            </div>
          </div>
        </div>
        <button class="btn btn-success btn-block">New Project <i class="mdi mdi-plus"></i>
        </button>
      </div>
    </li>

    <li class="nav-item {{ active_class(['/home']) }}">
      <a class="nav-link" href="{{ url('/home') }}">
        <img src="{{ url('assets/images/sidenav/dashboard.png') }}" alt="profile image" style="margin-right: 10px;">
        <span class="menu-title" style="color: #1e3d59;font-size: 120%;font-family:monospace; font-weight: 600;">Dashboard</span>
      </a>
    </li>
    <!-- Admin -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#adminSubMenu" aria-expanded="false" aria-controls="adminSubMenu">
        <img src="{{ url('assets/images/sidenav/protection.png') }}" alt="profile image" style="margin-right: 10px;">
        <span class="menu-title" style="color: #1e3d59;font-size: 120%;font-family:monospace; font-weight: 600;">Admin</span>
        <i class="menu-arrow"></i>
      </a>

      <div class="collapse" id="adminSubMenu">
        <a class="nav-link {{ active_class(['category']) }}" href="{{ route('admin.category') }}">
          <img src="{{ url('assets/images/sidenav/application.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Category</span>
        </a>
      </div>

      <div class="collapse" id="adminSubMenu">
        <a class="nav-link {{ active_class(['brand']) }}" href="{{ route('admin.brand') }}">
          <img src="{{ url('assets/images/sidenav/C.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Brand</span>
        </a>
      </div>

      <div class="collapse" id="adminSubMenu">
        <a class="nav-link {{ active_class(['description']) }}" href="{{ route('admin.description') }}">
          <img src="{{ url('assets/images/sidenav/job-description.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Description</span>
        </a>
      </div>

      <div class="collapse" id="adminSubMenu">
        <a class="nav-link {{ active_class(['seregistration']) }}" href="{{ route('admin.seregistration') }}">
          <img src="{{ url('assets/images/sidenav/website.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">SE Registration</span>
        </a>
      </div>

      <div class="collapse" id="adminSubMenu">
        <a class="nav-link {{ active_class(['supplier']) }}" href="{{ route('admin.supplier') }}">
          <img src="{{ url('assets/images/sidenav/supplier.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Supplier</span>
        </a>
      </div>

      <div class="collapse" id="adminSubMenu">
        <a class="nav-link {{ active_class(['costingHead']) }}" href="{{ route('admin.costingHead') }}">
          <img src="{{ url('assets/images/sidenav/package.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Costing Head</span>
        </a>
      </div>

      <div class="collapse" id="adminSubMenu">
        <a class="nav-link {{ active_class(['shopLogo']) }}" href="{{ route('admin.shopLogo') }}">
          <img src="{{ url('assets/images/sidenav/picture.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Shop Logo</span>
        </a>
      </div>


      <div class="collapse" id="adminSubMenu">
        <a class="nav-link {{ active_class(['shopStatus']) }}" href="{{ route('admin.shopStatus') }}">
          <img src="{{ url('assets/images/sidenav/contract.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Shop Status</span>
        </a>
      </div>

      <div class="collapse" id="adminSubMenu">
        <a class="nav-link {{ active_class(['shopPayment']) }}" href="{{ route('shopPayment') }}">
          <img src="{{ url('assets/images/sidenav/online-shop.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Shop Payment</span>
        </a>
      </div>
    </li>
    <!-- Purchase -->
    <li class="nav-item {{ active_class(['/purchase']) }}">
      <a class="nav-link" href="{{ url('/purchase') }}">
        <img src="{{ url('assets/images/sidenav/shopping-cart.png') }}" alt="profile image" style="margin-right: 10px;">
        <span class="menu-title" style="color: #1e3d59;font-size: 120%;font-family:monospace; font-weight: 600;">Purchase</span>
      </a>
    </li>


    <!-- Sales -->
    <li class="nav-item {{ active_class(['/']) }}">
      <a class="nav-link" data-toggle="collapse" href="#salesSubMenu" aria-expanded="false" aria-controls="salesSubMenu">
        <img src="{{ url('assets/images/sidenav/graph.png') }}" alt="profile image" style="margin-right: 10px;">
        <span class="menu-title" style="color: #1e3d59;font-size: 120%;font-family:monospace; font-weight: 600;">Sales</span>
        <i class="menu-arrow"></i>
      </a>

      <div class="collapse" id="salesSubMenu">
        <a class="nav-link {{ active_class(['stockSummery']) }}" href="{{ route('stockSummery') }}">
          <img src="{{ url('assets/images/sidenav/psale.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Product Sales</span>
        </a>
      </div>

      <div class="collapse" id="salesSubMenu">
        <a class="nav-link {{ active_class(['salesReturn']) }}" href="{{ route('salesReturn') }}">
          <img src="{{ url('assets/images/sidenav/salesReturn.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Sales Return</span>
        </a>
      </div>

      <div class="collapse" id="salesSubMenu">
        <a class="nav-link {{ active_class(['searchInvoice']) }}" href="{{ route('searchInvoice') }}">
          <img src="{{ url('assets/images/sidenav/search.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Search Invoice</span>
        </a>
      </div>


      <div class="collapse" id="salesSubMenu">
        <a class="nav-link {{ active_class(['adjustCreditSale']) }}" href="{{ route('adjustCreditSale') }}">
          <img src="{{ url('assets/images/sidenav/adjust.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Adjust On Credit</span>
        </a>
      </div>

      <div class="collapse" id="salesSubMenu">
        <a class="nav-link {{ active_class(['comissionJournal']) }}" href="{{ route('comissionJournal') }}">
          <img src="{{ url('assets/images/sidenav/commission.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Commission Journal</span>
        </a>
      </div>

      <div class="collapse" id="salesSubMenu">
        <a class="nav-link {{ active_class(['salesCustomer']) }}" href="{{ route('salesCustomer') }}">
          <img src="{{ url('assets/images/sidenav/customer.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Customer</span>
        </a>
      </div>
    </li>
    <!-- Sales -->

    <!-- Stock -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#stockSubMenu" aria-expanded="false" aria-controls="stockSubMenu">
        <img src="{{ url('assets/images/sidenav/in-stock.png') }}" alt="profile image" style="margin-right: 10px;">
        <span class="menu-title" style="color: #1e3d59;font-size: 120%;font-family:monospace; font-weight: 600;">Stock</span>
        <i class="menu-arrow"></i>
      </a>

      <div class="collapse" id="stockSubMenu">
        <a class="nav-link {{ active_class(['stockSummery']) }}" href="{{ route('stockSummery') }}">
          <img src="{{ url('assets/images/sidenav/stockSummary.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Stock Summary</span>
        </a>
      </div>

      <div class="collapse" id="stockSubMenu">
        <a class="nav-link {{ active_class(['stockModule']) }}" href="{{ route('stockModule') }}">
          <img src="{{ url('assets/images/sidenav/module.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Stock Module</span>
        </a>
      </div>
    </li>
    <!-- Stock -->
    <!-- Account -->
    <li class="nav-item ">
      <a class="nav-link" data-toggle="collapse" href="#accountSubMenu" aria-expanded="false" aria-controls="accountSubMenu">
        <img src="{{ url('assets/images/sidenav/verified-account.png') }}" alt="profile image" style="margin-right: 10px;">
        <span class="menu-title" style="color: #1e3d59;font-size: 120%;font-family:monospace; font-weight: 600;">Accounts</span>
        <i class="menu-arrow"></i>
      </a>

      <div class="collapse" id="accountSubMenu">
        <a class="nav-link {{ active_class(['accJournal']) }}" href="{{ route('accJournal') }}">
          <img src="{{ url('assets/images/sidenav/journal.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Acc_Journal</span>
        </a>
      </div>

      <div class="collapse" id="accountSubMenu">
        <a class="nav-link {{ active_class(['accLedger']) }}" href="{{ route('accLedger') }}">
          <img src="{{ url('assets/images/sidenav/annual-report.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Acc_Ledger</span>
        </a>
      </div>

      <div class="collapse" id="accountSubMenu">
        <a class="nav-link {{ active_class(['productWiseProfit']) }}" href="{{ route('productWiseProfit') }}">
          <img src="{{ url('assets/images/sidenav/annual-report.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Product Wise Profit/Loss</span>
        </a>
      </div>
    </li>
    <!-- Account -->


    <!-- Payment -->
    <li class="nav-item {{ active_class(['/']) }}">
      <a class="nav-link" data-toggle="collapse" href="#paymentSubMenu" aria-expanded="false" aria-controls="paymentSubMenu">
        <img src="{{ url('assets/images/sidenav/payment.png') }}" alt="profile image" style="margin-right: 10px;">
        <span class="menu-title" style="color: #1e3d59;font-size: 120%;font-family:monospace; font-weight: 600;">Payment</span>
        <i class="menu-arrow"></i>
      </a>

      <div class="collapse" id="paymentSubMenu">
        <a class="nav-link {{ active_class(['supplierPayment']) }}" href="{{ route('supplierPayment') }}">
          <img src="{{ url('assets/images/sidenav/debit-card.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Supplier Payment</span>
        </a>
      </div>

      <div class="collapse" id="paymentSubMenu">
        <a class="nav-link {{ active_class(['expense']) }}" href="{{ route('expense') }}">
          <img src="{{ url('assets/images/sidenav/expense.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Expense</span>
        </a>
      </div>

      <div class="collapse" id="paymentSubMenu">
        <a class="nav-link {{ active_class(['bankInfo']) }}" href="{{ route('bankInfo') }}">
          <img src="{{ url('assets/images/sidenav/bank.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Bank Info</span>
        </a>
      </div>

      <div class="collapse" id="paymentSubMenu">
        <a class="nav-link {{ active_class(['investment']) }}" href="{{ route('investment') }}">
          <img src="{{ url('assets/images/sidenav/investment.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Investment</span>
        </a>
      </div>
    </li>
    <!-- Payment -->

    <!-- Report -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#reportSubMenu" aria-expanded="false" aria-controls="reportSubMenu">
        <img src="{{ url('assets/images/sidenav/3d-report.png') }}" alt="profile image" style="margin-right: 10px;">
        <span class="menu-title" style="color: #1e3d59;font-size: 120%;font-family:monospace; font-weight: 600;">Report</span>
        <i class="menu-arrow"></i>
      </a>

      <div class="collapse" id="reportSubMenu">
        <a class="nav-link {{ active_class(['cashFlowReport']) }}" href="{{ route('cashFlowReport') }}">
          <img src="{{ url('assets/images/sidenav/money-flow.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Cash Flow</span>
        </a>
      </div>

      <div class="collapse" id="reportSubMenu">
        <a class="nav-link {{ active_class(['droppedInvoice']) }}" href="{{ route('droppedInvoice') }}">
          <img src="{{ url('assets/images/sidenav/cancel.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Dropped Invoice</span>
        </a>
      </div>

    </li>
    <!-- Report -->


    <li class="nav-item {{ active_class(['charts/chartjs']) }}">
      <a class="nav-link" href="{{ url('/charts/chartjs') }}">
        <img src="{{ url('assets/images/sidenav/pie-chart.png') }}" alt="profile image" style="margin-right: 10px;">
        <span class="menu-title" style="color: #1e3d59;font-size: 120%;font-family:monospace; font-weight: 600;">Charts</span>
      </a>
    </li>
    <li class="nav-item {{ active_class(['tables/basic-table']) }}">
      <a class="nav-link" href="{{ url('/tables/basic-table') }}">
        <img src="{{ url('assets/images/sidenav/frequency.png') }}" alt="profile image" style="margin-right: 10px;">
        <span class="menu-title" style="color: #1e3d59;font-size: 120%;font-family:monospace; font-weight: 600;">Tables</span>
      </a>
    </li>

    <!-- No Need -->
    <!-- <li class="nav-item {{ active_class(['icons/material']) }}">
      <a class="nav-link" href="{{ url('/icons/material') }}">
        <i class="menu-icon mdi mdi-emoticon"></i>
        <span class="menu-title" style="color: #1e3d59;font-size: 120%;font-family:monospace; font-weight: 600;">Icons</span>
      </a>
    </li> -->
    <!-- <li class="nav-item {{ active_class(['user-pages/*']) }}">
      <a class="nav-link" data-toggle="collapse" href="#user-pages" aria-expanded="{{ is_active_route(['user-pages/*']) }}" aria-controls="user-pages">
        <i class="menu-icon mdi mdi-lock-outline"></i>
        <span class="menu-title" style="color: #1e3d59;font-size: 120%;font-family:monospace; font-weight: 600;">User Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class(['user-pages/*']) }}" id="user-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class(['user-pages/login']) }}">
            <a class="nav-link" href="{{ url('/user-pages/login') }}">Login</a>
          </li>
          <li class="nav-item {{ active_class(['user-pages/register']) }}">
            <a class="nav-link" href="{{ url('/user-pages/register') }}">Register</a>
          </li>
          <li class="nav-item {{ active_class(['user-pages/lock-screen']) }}">
            <a class="nav-link" href="{{ url('/user-pages/lock-screen') }}">Lock Screen</a>
          </li>
        </ul>
      </div>
    </li> -->
  </ul>
</nav>