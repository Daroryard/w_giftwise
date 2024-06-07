<div class="navcontainer">
        <nav class="nav">
            <div class="nav-upper-options">
                <div class="nav-hidden" style="justify-content: right">
                    <img src="{{ asset('assets/frontend/images/profile_customer/arrow-left.png') }}" class="icn menuicns" alt="menu-icon">
                </div>

               
                <a href="/{{ app()->getLocale() }}/customer/profile">
                <div class="nav-option option menu-cus1">
                    <img src="{{ asset('assets/frontend/images/profile_customer/1.png') }}" class="nav-img">
                    <h4> {{ __('validation.customer_nav_port') }}</h4>
                </div>
                </a>

                <a href="/{{ app()->getLocale() }}/customer/quotation">
                <div class="nav-option option menu-cus2">
                    <img src="{{ asset('assets/frontend/images/profile_customer/quotation.png') }}" class="nav-img">
                    <h4> {{ __('validation.customer_nav_quotation') }}</h4>                              
                </div>
                </a>

                <div class="nav-option option dropdown-list">
                    <img src="{{ asset('assets/frontend/images/profile_customer/list.png') }}" class="nav-img">
                    <h4> {{ __('validation.customer_nav_production') }}
                    <i class="fa fa-caret-down" style="margin-left: 10px"></i>
                    </h4> 
                </div>

                <div id="dp1" style="display: none;">
                    <div class="nav-option option menu-cus3">
                        <a href="/{{ app()->getLocale() }}/customer/production-all"><h4>แสดงทั้งหมด</h4></a>
                    </div>
                    <div class="nav-option option menu-cus4">
                        <a href="/{{ app()->getLocale() }}/customer/production-confirm"><h4>รอยืนยันใบสั่งขาย</h4></a>
                    </div>
                    <div class="nav-option option menu-cus5">
                        <a href="/{{ app()->getLocale() }}/customer/production-prototype"><h4>การผลิตต้นแบบ</h4></a>
                    </div>
                    <div class="nav-option option menu-cus6">
                        <a href="/{{ app()->getLocale() }}/customer/production-real"><h4>การผลิตสินค้าจริง</h4></a>
                    </div>
                    <!-- <div class="nav-option option menu-cus7">
                        <a href="/{{ app()->getLocale() }}/customer/production-warehouse"><h4>อยู่ในคลัง</h4></a>
                    </div> -->
                </div>
               

                <div class="nav-option option dropdown-list-warehouse">
                    <img src="{{ asset('assets/frontend/images/profile_customer/warehouse.png') }}" class="nav-img">
                    <h4> {{ __('validation.customer_nav_warehouse') }}</h4>
                    <i class="fa fa-caret-down" style="margin-left: 10px"></i>
                </div>



                <div id="dp2" style="display: none;">
                    <div class="nav-option  menu-cus8">
                        <a href="/{{ app()->getLocale() }}/customer/warehouse-all-in"><h4>สินค้าในคลังทั้งหมด</h4></a>
                    </div>
                    <div class="nav-option option menu-cus9">
                        <a href="/{{ app()->getLocale() }}/customer/warehouse-giftwise-in"><h4>สินค้าของ Giftwise</h4></a>
                    </div>
                    <div class="nav-option option menu-cus10">
                        <a href="/{{ app()->getLocale() }}/customer/warehouse-deposit"><h4>สินค้าฝาก</h4></a>
                    </div>                
                </div>



                <a href="/{{ app()->getLocale() }}/customer/transport">
                <div class="nav-option option menu-cus11">
                    <img src="{{ asset('assets/frontend/images/profile_customer/box-car.png') }}" class="nav-img">
                    <h4> {{ __('validation.customer_nav_transpot') }}</h4>
                </div>
                </a>
                
                <a href="/{{ app()->getLocale() }}/customer/logout">
                <div class="nav-option option">
                    <img src="{{ asset('assets/frontend/images/profile_customer/log-out.png') }}" class="nav-img">
                    <h4> {{ __('validation.customer_nav_logout') }}</h4>
                </div>
                </a>

            </div>
        </nav>
    </div>