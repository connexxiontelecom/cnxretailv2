<div class="header-left mr-md-4">
    <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
    </a>
    <a href="{{route('homepage')}}" class="logo ml-lg-0">
        <img src="/assets/images/logo.png" alt="logo" width="144" height="45" />
    </a>
    <form method="get" action="{{route('product-search')}}" class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
        @csrf
        <div class="select-box">
        </div>
        <input type="text"  class="form-control" name="keyword" id="keyword"
               placeholder="Search for product..."  />
        <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
        </button>
    </form>
</div>
