<div class="col-12 col-sm-12 col-md-12 col-lg-7 mt-3">
                    <div class="input-group">
                        <span class="input-group-text me-2">
                            <i class="fas fa-search text-secondary mt-1"></i>
                        </span>
                        <input type="search" class="form-control no-border-input" placeholder="{{ __('validation.top_search_input') }}" onkeyup="search(this.value)" onclick="clearSearch()">
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-0 mt-sm-0 mt-md-3 mt-lg-3 mt-xl-3" style="padding-top : 5px;">
                    <div class="d-flex flex">
                        <div class="me-2">{{ __('validation.top_popular_search') }} :</div>
                        <a href="/{{ app()->getLocale() }}/product-quick-tag/72/-"><span class="badge p-2">{{ __('validation.top_popular_search_1') }}</span></a>
                        <a href="/{{ app()->getLocale() }}/product-quick-tag/71/-"><span class="badge p-2">{{ __('validation.top_popular_search_2') }}</span></a>
                        <a href="/{{ app()->getLocale() }}/product-quick-tag/73/-"><span class="badge p-2">Staff Pick</span></a>
                        <a href="/{{ app()->getLocale() }}/product-quick-tag/74/-"><span class="badge p-2">Gift Set</span></a>
                    </div>
                </div>

                <div id="result-search" hidden>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-7" style="border: 0.2px solid #ccc;border-radius:5px !important">
                        <ul class="list-group dropdown scroll-list">

                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-0 mt-sm-0 mt-md-3 mt-lg-3 mt-xl-3" style="padding-top : 5px;">
                    </div>
                </div>